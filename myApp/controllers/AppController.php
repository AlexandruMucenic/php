<?php

class AppController
{
    protected $routes = [
        'home' => 'HomeController',
        'contact' => 'ContactController',
        'about' => 'AboutController',
        'login' => 'LoginController',
        'signup' => 'SignUpController',
        'blog' => 'BlogController',
        'logout' => 'LogoutController'
    ];

    public function __construct() {
        $this->init();
    }

    public function init() {
        $page = $_GET['page'] ?? 'home';
        $className = $this->routes[$page] ?? $this->routes['home'];
        new $className;
    }

    public function render($page, $data = []) {
        $template = file_get_contents(VIEWS . 'layout.html'); // Corrected Path
        preg_match_all("/{{\w+}}/", $template, $matches);
    
        foreach ($matches[0] as $value) {
            $key = trim($value, '{}');
            if (array_key_exists($key, $data)) {
                $template = str_replace($value, $data[$key], $template);
            }
        }
        
        return $template;
    }
}
