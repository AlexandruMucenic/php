<?php
session_start();
include 'config.php';
include 'head.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $password = $_POST['password'];
    $telefon = $_POST['telefon'];
    $order = $_POST['order'];

    if (empty($name) || empty($password) || empty($telefon)) {
        echo "Name, phone, and password are required.";
        exit;
    }

    if ($order !== 'asc' && $order !== 'desc') {
        echo "Invalid order value.";
        exit;
    }
    $order = strtoupper($order);

    $query = "SELECT * FROM users WHERE name = $1";
    $result = pg_query_params($db, $query, [$name]);

    if ($user = pg_fetch_assoc($result)) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            $_SESSION['telefon'] = $user['telefon']; 
            $_SESSION['order'] = $order; 

            header('Location: index.php');
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}
?>

<form action="login.php" method="POST">
    <h1>Login</h1>
    <input type="text" name="name" placeholder="Name" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="text" name="telefon" placeholder="Phone" required>
    <select name="order" required>
        <option value="" disabled selected>Order</option>
        <option value="asc">Ascending</option>
        <option value="desc">Descending</option>
    </select>
    <button type="submit">Login</button>
</form>
