<?php
    error_reporting(-1);

    use Src\Router;

    define('ROOT',dirname(__DIR__));

    define('ROUTES',ROOT . '/app/config/routes.php');
    define('DB',ROOT . '/app/config/database.php');
    define('FIELD',ROOT.'/app/config/fields.php');

    require __DIR__ . '/../vendor/autoload.php';

    $router = new Router();
    $router->run();