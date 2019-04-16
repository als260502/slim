<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
/*
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->view->render($response, 'home.twig', $args);
    //return $this->renderer->render($response, 'home.twig', $args);
});
*/


$app->get('/', 'HomeController:index')->setName('home'); 

$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app->post('/auth/signup', 'AuthController:postSignUp');

$app->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
$app->post('/auth/signin', 'AuthController:postSignIn');

$app->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');

$app->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');
$app->post('/auth/password/change', 'PasswordController:postChangePassword');