<?php
error_reporting(-1);

use vendor\core\Router;

$query = rtrim($_SERVER['REQUEST_URI'],'/');

define('www',__DIR__);
define('CORE',dirname(__DIR__).'vendor/core');
define('ROOT',dirname(__DIR__));
define('APP',dirname(__DIR__).'/app');
define('LAYOUT','default');

require '../vendor/libs/function.php';

spl_autoload_register(function ($class){
    $file = ROOT.'/'.str_replace('\\','/',$class).'.php';
    if(is_file($file)){
       require_once $file;
    }
});


Router::addRoute('^$',['controller'=>'Main', 'action'=>'index']);
Router::addRoute('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);