<?php

class HomeController extends AppController
{
    public function __construct() {
        $this->init();
    }

    public function init() {
        session_start();
        $data = [];

        if (isset($_SESSION['authenticatedUser'])) {
            $data['title'] = 'PRIVATE HOME PAGE';
            $data['mainContent'] = '<h2>Welcome back!</h2>';
            echo $this->render(APP_PATH . VIEWS . 'layoutAuth.html', $data); 
        } else {
            $data['title'] = 'HOME PAGE';
            $data['mainContent'] = '<h2>Welcome to our Blog!</h2>';
            echo $this->render(APP_PATH . VIEWS . 'layout.html', $data);
        }
    }
}
