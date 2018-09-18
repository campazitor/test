<?php

    namespace Src\controllers;

    use Src\base\Controller;
    use Src\model\Home;

    /**
     * Class IndexController
     *
     * @package controllers
     */
    class HomeController extends Controller
    {

        public function actionIndex() {

            $title = "students list";

            $model = new Home();

            if (!empty($_POST)) {
                $data = $_POST;
                $model->save($model->table, $data);
                header("Location: " . $_SERVER['REQUEST_URI']);
            }

            $postNames = $model->getAttr();
            $posts = $model->findAll();

            $this->set(compact('postNames', 'posts', 'title'));

        }

        public function actionAdd() {

            $title = "add student";

            $model = new Home();

            if (!empty($_POST)) {
                $data = $_POST;

                $model->save($model->table, $data);
                header("Location: /");
            }

            $postNames = $model->getAttr();
            $postTypes = $model->getAttrType();

            $this->set(compact('title','postNames', 'postTypes'));

        }

        public function actionEdit($id) {
            $title = "edit student";

            $model = new Home();
            $postOne = $model->findOne($id);

            if (!empty($_POST)) {
                $data = $_POST;
                $model->update($model->table, $data);
                header("Location: /");
            }
            $postNames = $model->getAttr();
            $postTypes = $model->getAttrType();

            $this->set(compact('title', 'postOne', 'postNames', 'postTypes'));

        }

        public function actionDelete($id) {

            $model = new Home();

            $model->delete($model->table, $id);
            header("Location: /");

        }

    }