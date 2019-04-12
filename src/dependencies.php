<?php
use App\Controller\HomeController;
use Slim\Views\PhpRenderer;
use App\Controller\Auth\AuthController;

// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

$container['view'] = function($container){
    $settings =  $container->get('settings')['renderer'];
    $view  = new PhpRenderer($settings['view'], [
        'cache' => false,
    ]);
    
    return $view;
};

//Controllers
$container['HomeController'] = function ($container) 
{
    return new HomeController($container);
};
$container['AuthController'] = function ($container) 
{
    return new AuthController($container);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ( $capsule ) {

     return $capsule;

};