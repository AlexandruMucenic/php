<?php
class UsersModel
{
    public function getUserList() {
        return $_SESSION['users'] ?? [];
    }

    public function deleteUser($userId) {
        if (isset($_SESSION['users'][$userId])) {
            unset($_SESSION['users'][$userId]);
            return true;
        }
        return false;
    }

    public function registerUser($username, $password) {
        session_start();
        $userId = uniqid();
        $_SESSION['users'][$userId] = [
            'id' => $userId,
            'username' => $username,
            'email' => 'generic@gmail.com',
            'passwordHash' => password_hash($password, PASSWORD_DEFAULT)
        ];
        return true;
    }

    public function authenticateUser($username, $password) {
        if (!isset($_SESSION['users'])) {
            return false;
        }
        foreach ($_SESSION['users'] as $user) {
            if ($user['username'] === $username && password_verify($password, $user['passwordHash'])) {
                return true;
            }
        }
        return false;
    }
}
