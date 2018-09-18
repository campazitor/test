<?php

    namespace Src;

    class Router
    {

        /**
         * list routing
         *
         * @var array
         */
        private $routes = [];

        /**
         * Router constructor.
         */
        public function __construct()
        {
            $routesPath = ROUTES;
            $this->routes = include $routesPath;
        }

        /**
         * starts the required router
         */
        public function run()
        {

            $uri = $this->getURI();

            foreach ($this->routes as $pattern => $path) {

                if (preg_match("~^$pattern$~", $uri)) {

                    $internalRoute = preg_replace("~$pattern~", $path, $uri);
                    $segments = explode('/', $internalRoute);
                    $route = array_splice($segments, 0, 2);

                    $controllerName = '\Src\controllers\\' . ucfirst($route[0]) . 'Controller';
                    $actionName = 'action' . ucfirst($route[1]);

                    if (class_exists($controllerName)) {

                        $object = new $controllerName($route);

                        if (method_exists($object, $actionName)) {
                            call_user_func_array([$object, $actionName],
                                $segments);
                            $object->getView();
                            break;
                        } else {
                            echo "$controllerName";
                            echo "Метод $actionName не найден";
                        }
                    } else {
                        echo "Контроллер $controllerName  не найден";
                    }

                }

            }

            if (!isset($controllerName)) {
                require ROOT . "/app/views/error/404.php";
            }

        }

        /**
         * Returns request string
         *
         * @return string
         */
        private function getURI()
        {
            if (!empty($_SERVER['REQUEST_URI'])) {
                if ($_SERVER['REQUEST_URI'] == '/') {
                    return 'index';
                } else {
                    return trim($_SERVER['REQUEST_URI'], '/');
                }
            }
        }

    }