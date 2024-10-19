<?php

class ContactController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        session_start();
        if(isset($_SESSION['user'])){
            $data['title'] = 'PRIVATE CONTACT PAGE';
            $data['mainContent'] = '<h2>PRIVATE CONTACT page content</h2>';
            echo $this->render(APP_PATH.VIEWS.'layoutAuth.html', $data);
        }
        else {
            $data['title'] = 'CONTACT PAGE';
            $data['mainContent'] = '<h2>CONTACT page specific content</h2>';
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);
        }
    }
}