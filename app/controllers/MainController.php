<?php

namespace app\controllers;

class MainController extends App {


    public function indexAction()
    {
        $this->layout = 'default';
        $this->view = 'main_view';
    }

}