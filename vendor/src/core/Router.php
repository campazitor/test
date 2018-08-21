<?php

namespace src\core;


/**
 * Class Router
 * @package vendor\core
 */
class Router
{
    /**
     * routing table
     * @var array
     */
    protected static $routes = [];

    /**
     * current route
     * @var array
     */
    protected static $route = [];

    /**
     * add new route
     * @param string $regexp
     * @param array $route
     */
    public static function addRoute($regexp,$route=[]){
        self::$routes[$regexp] = $route;
    }

    /**
     * returns a routing table
     * @return array
     */
    public static function getRoutes(){
        return self::$routes;
    }

    /**
     * returns the route
     * @return array
     */
    public static function getRoute(){
        return self::$route;
    }

    /**
     * find url in the route table
     * @param string $url
     * @return boolean
     */
    private static function matchRoute($url){
        foreach (self::$routes as $pattern => $route){
            if(preg_match("#$pattern#",$url,$matches)){
                foreach ($matches as $k => $v){
                    if(!is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }

                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * redirects the url on the correct route
     * @param string $url
     * @return void
     */
    public static function dispatch($url){
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\'.self::$route['controller'].'Controller';
            if(class_exists($controller)){
                $cObj = new $controller(self::$route);
                $action = self::$route['action'].'Action';
                if(method_exists($cObj, $action)){
                    $cObj->$action();
                    $cObj->getView();
                }else{
                    echo "Метод <b>$controller::$action</b> не найден";
                }
            }else{
                echo "Контроллер <b>$controller</b> не найден";
            }
        }else{
            http_response_code(404);
            include '404.html';
        }
    }


}