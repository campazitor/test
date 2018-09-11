<?php
    error_reporting(-1);

    use Src\Router;

    define('ROOT',dirname(__DIR__));

    require __DIR__ . '/../vendor/autoload.php';

    $router = new Router();
    $router->run();