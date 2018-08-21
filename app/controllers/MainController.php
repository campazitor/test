<?php

namespace app\controllers;

use app\models\Main;

class MainController extends App {

    public function indexAction()
    {

        $this->view = 'index';
        $title = "MAIN TABLE";

        $model = new Main;

        if (!empty($_POST)) {
            $data = $_POST;
            $model->save('students',$data);
            header("Location: ".$_SERVER['REQUEST_URI']);
        }

        $posts = $model->findAll();

        $this->set(compact('posts','title'));

    }

}