<?php

namespace App\Controller\Auth;

use App\Controller\BaseController;
use App\Model\User;
use Respect\Validation\Validator as v;

class AuthController extends BaseController
{

    public function getSignOut($request, $response)
    {
        // sign out
        $this->auth->logout();

        // redirect
        return $response->withRedirect($this->router->pathFor('home'));

    }


    public function getSignIn($request, $response)
    {

        return $this->view->render($response, 'auth/signin.twig');
    }

    public function postSignIn($request, $response)
    {
        $auth = $this->auth->attempt(
            $request->getParam('email'),
            $request->getParam('password')
        );

        if (!$auth) {
            $this->flash->addMessage('error', 'Could not sign in you with those details ');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }

        return $response->withRedirect($this->router->pathFor('home'));

    }


    public function getSignUp($request, $response)
    {


        $this->view->render($response, 'auth/signup.twig');

    }

    public function postSignUp($request, $response)
    {

        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
            'name' => v::notEmpty(),
            'password' => v::noWhitespace()->notEmpty(),
        ]);

        if ($validation->failed()) {
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }


        $user = User::create([
            'email' => $request->getParam('email'),
            'name' => $request->getParam('name'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT)
        ]);

        $this->flash->addMessage('info', 'You have ben sign up!');
        $this->auth->attempt($user->email, $request->getParam('password'));

        return $response->withRedirect($this->router->pathFor('home'));
    }

}