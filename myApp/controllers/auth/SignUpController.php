<?php
class SignUpController extends AppController
{
    public function __construct() {
        $this->init();
    }

    public function init() {
        if (!isset($_POST['signupName']) || !isset($_POST['signupPass'])) {
            echo '<h1 style="color:red">Invalid request!</h1>';
            header("Refresh: 3; url=home");
            exit;
        }

        $username = $_POST['signupName'];
        $password = $_POST['signupPass'];

        $userModel = new UsersModel();

        if ($userModel->registerUser($username, $password)) {
            session_start();
            $_SESSION['authenticatedUser'] = $username;

            $data['mainContent'] = '<h1 style="color:green">Welcome!</h1>' . $username;
            echo $this->render(APP_PATH . VIEWS . 'layoutAuth.html', $data);
        } else {
            echo '<h1 style="color:red">User already exists!</h1>';
            header("Refresh: 3; url=home");
            exit;
        }
    }
}
