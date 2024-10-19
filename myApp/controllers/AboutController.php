<?php

class AboutController extends AppController
{
    public function __construct() {
        $this->init();
    }

    public function init() {
        session_start();
        $data = [];

        if (isset($_SESSION['user'])) {
            $data['title'] = 'PRIVATE ABOUT PAGE';
            $data['mainContent'] = '<h2>PRIVATE ABOUT page content</h2>';
            echo $this->render(APP_PATH . VIEWS . 'layoutAuth.html', $data);
        } else {
            $data['title'] = 'ABOUT PAGE';
            $data['mainContent'] = '<h2>ABOUT page specific content</h2>';
            echo $this->render(APP_PATH . VIEWS . 'layout.html', $data);
        }
    }
}