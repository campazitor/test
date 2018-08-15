<?php

namespace vendor\core\base;


abstract class Controller
{
    /**
     * current route
     * @var array
     */
    public $route;

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

    public function __construct($route){
        $this->route = $route;
        $this->view = $route['action'];
        //include APP."/views/{$route['controller']}/{$this->view}.php";
    }

    /**
     * get the file of the view
     */
    public function getView(){
        $vObj = new View($this->route,$this->layout, $this->view);
        $vObj->render();
    }
}