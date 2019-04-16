<?php
use App\Controller\HomeController;
use App\Controller\Auth\AuthController;
use App\Validation\Validator;
use Respect\Validation\Validator as v;

// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

$container['auth'] = function ($container){
    return new App\Auth\Auth;
};

$container['flash'] = function($container){
    return new Slim\Flash\Messages;
};

$container['view'] = function($container){
    $settings =  $container->get('settings')['renderer'];
    $view  = new \Slim\Views\Twig($settings['view'], [
        'cache' => false,
    ]);

    $view->addExtension(new Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    $view->getEnvironment()->addGlobal('auth', [
        'check' => $container->auth->check(),
        'user' => $container->auth->user(),
    ]);

    $view->getEnvironment()->addGlobal('flash', $container->flash);
    
    return $view;
};

$container['validator'] = function($container){
    return new Validator();
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
$container['PasswordController'] = function ($container)
{
    return new \App\Controller\Auth\PasswordController($container);
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

$container['csrf'] = function($container){
  return new \Slim\Csrf\Guard();
};



v::with('App\\Validation\\Rules\\');

