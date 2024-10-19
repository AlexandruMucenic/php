<?php
include 'config.php';
include 'head.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $password = $_POST['password'];
    $photo = $_FILES['photo'];
    $telefon = trim($_POST['telefon']);
    $registration_date = date('Y-m-d');

    if (empty($name) || empty($password) || empty($telefon)) {
        echo "Name, password and phone are required.";
        exit;
    }

    if (!preg_match('/^[0-9+\s]+$/', $telefon)) {
        echo "Phone number is invalid";
        exit;
    }

    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
        exit;
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($photo['type'], $allowed_types)) {
        echo "Only JPG, PNG, and GIF files are allowed.";
        exit;
    }

    if ($photo['error'] !== 0) {
        echo "Error uploading photo.";
        exit;
    }
    $photo_path = 'photos/' . basename($photo['name']);
    move_uploaded_file($photo['tmp_name'], $photo_path);

    $query = "INSERT INTO users (name, password, photo, telefon, registration_date) VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($db, $query, [$name, $hashed_password, $photo['name'], $telefon, $registration_date]);

    if ($result) {
        header('Location: login.php');
        exit;
    } else {
        echo "Error: " . pg_last_error();
        exit;
    }
}
?>

<form action="register.php"
      method="POST"
      enctype="multipart/form-data">
    <h1>Register</h1>
    <input type="text"
           name="name"
           placeholder="Name"
           required>
    <input type="password"
           name="password"
           placeholder="Password"
           required>
    <input type="text" name="telefon" placeholder="Phone number" required><br>
    <input type="file"
           name="photo"
           accept="image/jpeg, image/png, image/gif"
           required>
    <button type="submit">Register</button>
</form>