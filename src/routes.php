<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
/*
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->view->render($response, 'index.phtml', $args);
    //return $this->renderer->render($response, 'index.phtml', $args);
});
*/


$app->get('/', 'HomeController:index'); 

$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app->get('/auth/signup', 'AuthController:postSignUp');