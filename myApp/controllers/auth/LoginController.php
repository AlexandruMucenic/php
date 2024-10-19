<?php
class LoginController extends AppController
{
    public function __construct() {
        $this->init();
    }

    public function init() {
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            echo '<h1 style="color:red">Invalid request!</h1>';
            header("Refresh: 3; url=home");
            exit;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $userModel = new UsersModel();

        if ($userModel->authenticateUser($username, $password)) {
            session_start();
            $_SESSION['authenticatedUser'] = $username;
            header('Location: home');
            exit;
        } else {
            echo '<h1 style="color:red">Incorrect credentials!</h1>';
            header("Refresh: 3; url=home");
            exit;
        }
    }
}
