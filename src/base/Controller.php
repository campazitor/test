<?php

    namespace Src\base;


    abstract class Controller {

        /**
         * current route
         *
         * @var array
         */
        public $route;


        /**
         * user data
         *
         * @var array
         */
        public $data;

        public function __construct($route) {
            $this->route = $route;
        }

        /**
         * get the file of the views
         */
        public function getView() {
            $object = new View($this->route);
            $object->render($this->data);
        }

        public function set($data) {
            $this->data = $data;
        }
    }