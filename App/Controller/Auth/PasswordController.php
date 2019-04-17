<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 16/04/2019
 * Time: 16:37
 */

namespace App\Controller\Auth;


use App\Controller\BaseController;
use App\Model\User;
use Respect\Validation\Validator as v;


class PasswordController extends BaseController
{

    public function getChangePassword($request, $response)
    {

        return $this->view->render($response, 'auth/change.twig');
    }

    public function postChangePassword($request, $response)
    {
        $validation = $this->validator->validate($request,[
            'password_old' => v::noWhitespace()->notEmpty()->matchesPassword($this->auth->user()->password),
            'password' => v::noWhitespace()->notEmpty(),
        ]);

        if($validation->failed()){
            return $response->withRedirect($this->router->pathFor('auth.password.change'));
        }

        $this->auth->user()->setPassword($request->getParam('password'));


        //flash
        $this->flash->addMessage('info', 'Your password was changed');
        
        //redirect
        return $response->withRedirect($this->router->pathFor('home'));

    }

}