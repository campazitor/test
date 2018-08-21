<?php
error_reporting(-1);

use src\core\Router;

$query = rtrim($_SERVER['REQUEST_URI'],'/');

define('CORE',dirname(__DIR__).'/vendor/src/core');
define('LIBS',dirname(__DIR__).'/vendor/src/libs');
define('ROOT',dirname(__DIR__));
define('APP',dirname(__DIR__).'/app');
define('LAYOUT','default');

require '../vendor/src/libs/function.php';
require __DIR__ . '/../vendor/autoload.php';

Router::addRoute('^$',['controller'=>'Main', 'action'=>'index']);
Router::addRoute('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);

