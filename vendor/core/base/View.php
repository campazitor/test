<?php

namespace vendor\core\base;


use app\controllers\App;

class View {

    /**
     * current route
     * @var array
     */
    public $route = [];

    /**
     * current view
     * @var string
     */
    public $view;

    /**
     * current layout
     * @var string
     */
    public $layout;

    public function __construct($route, $layout = '', $view = '') {
        $this->route = $route;
        $this->layout = $layout ?: LAYOUT;
        $this->view = $view;
    }

    /**
     * connect the file of the view
     */
    public function render(){
        $file_view = APP."/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view)){
            require $file_view;
        }else{
            echo "<p>Не найден вид <b>{$file_view}</b></p>";
        }
        $content = ob_end_clean();

        $file_layout = APP."/views/layout/{$this->layout}.php";
        if(is_file($file_layout)){
            require $file_layout;
        }else {
            echo "<p>Не найден шаблон <b>{$file_layout}</b></p>";
        }
    }

}