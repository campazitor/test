<?php

    namespace Src\base;

    class View
    {

        /**
         * current route
         *
         * @var string
         */
        public $route;

        /**
         * current layout
         *
         * @var string
         */
        public $layout;

        /**
         * View constructor.
         *
         * @param array $route
         * @param string $layout
         */
        public function __construct($route, $layout = 'default')
        {
            $this->route = $route;
            $this->layout = $layout;
        }

        /**
         * connecting view templates
         *
         * @param $data
         */
        public function render($data = [])
        {

            if (isset($data)) {
                extract($data);
            }

            $file_view = ROOT . "/app/views/{$this->route[0]}/{$this->route[1]}.php";

            ob_start();
            if (is_file($file_view)) {
                require $file_view;
            } else {
                echo "<p>Не найден вид <b>{$file_view}</b></p>";
            }
            $content = ob_get_clean();

            $file_layout = ROOT . "/app/views/layout/{$this->layout}.php";
            if (is_file($file_layout)) {
                require $file_layout;
            } else {
                echo "<p>Не найден шаблон <b>{$file_layout}</b></p>";
            }

        }

    }