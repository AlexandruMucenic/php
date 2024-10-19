<?php

class BlogController extends AppController
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        session_start();

        $data = [
            'title' => 'Home PAGE',
            'mainContent' => '<h2>Home page specific content</h2>',
        ];

        if (isset($_SESSION['user'])) {
            $data['title'] = 'PRIVATE BLOG PAGE';
            $data['mainContent'] = '<h2>PRIVATE BLOG page content</h2>';

            $user = new UsersModel();
            $data['mainContent'] .= $this->render(APP_PATH . VIEWS . 'blogView.html');
            $data['mainContent'] .= $user->tabel($user->showUsers());

            echo $this->render(APP_PATH . VIEWS . 'layoutAuth.html', $data);
            return;
        }

        echo $this->render(APP_PATH . VIEWS . 'layout.html', $data);
    }
}
