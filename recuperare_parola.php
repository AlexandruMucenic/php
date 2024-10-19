<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim(htmlspecialchars($_POST['username']));
    $email = trim(htmlspecialchars($_POST['email']));

    if (empty($username)) {
        echo "Nume de utilizator obligatoriu.<br>";
    }
    if (empty($email)) {
        echo "Adresa de email obligatoriu.<br>";
    }
    if (empty($username) || empty($email)) {
        exit; 
    }

    $query = "SELECT id FROM users WHERE name = $1 AND email = $2";
    $result = pg_query_params($db, $query, [$username, $email]);

    if ($user = pg_fetch_assoc($result)) {
        $new_password = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 10);
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $update_query = "UPDATE users SET password = $1 WHERE id = $2";
        pg_query_params($db, $update_query, [$hashed_password, $user['id']]);

        $to = $email;
        $subject = "Resetare parolă";
        $message = "Parola dumneavoastră pe pagina XY a fost schimbată cu succes. Noua parolă este: $new_password";
        $headers = "From: no-reply@xy.com\r\nContent-Type: text/plain; charset=UTF-8";

        if (mail($to, $subject, $message, $headers)) {
            echo "Parola a fost resetată și trimisă pe email.";
        } else {
            echo "Eroare la trimiterea emailului.";
        }

        exit;
    } else {
        echo "Utilizatorul sau emailul nu sunt corecte.";
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Recuperare Parolă</title>
</head>
<body>
    <h1>Recuperare Parolă</h1>
    <form action="recuperare_parola.php" method="POST">
        <input type="text" name="username" placeholder="Nume utilizator" required><br>
        <input type="email" name="email" placeholder="Email utilizator" required><br>
        <button type="submit">Modificare parolă</button>
    </form>
</body>
</html>
