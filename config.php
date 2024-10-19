<?php

define('APP_PATH', 'myApp/');
define('MODELS', APP_PATH . 'models/');
define('VIEWS', APP_PATH . 'views/');
define('CONTROLLERS', APP_PATH . 'controllers/');

spl_autoload_register(function($className) {
    $class = strtolower($className);
    $relativePath = '';

    if (str_contains($class, 'controller')) {
        $relativePath = CONTROLLERS;
        if (str_contains($class, 'login') || str_contains($class, 'signup') || str_contains($class, 'logout')) {
            $relativePath .= 'auth/';
        }
    } elseif (str_contains($class, 'model')) {
        $relativePath = MODELS;
    } elseif (str_contains($class, 'view')) {
        $relativePath = VIEWS;
    }

    if ($relativePath === '') {
        die("Invalid PATH for class: $className");
    }

    $filePath = $relativePath . $className . '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        die("File not found: $filePath");
    }
});
