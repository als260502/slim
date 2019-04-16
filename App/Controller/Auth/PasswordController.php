<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 16/04/2019
 * Time: 16:37
 */

namespace App\Controller\Auth;


use App\Controller\BaseController;


class PasswordController extends BaseController
{

    public function getChangePassword($request, $response)
    {

        return $this->view->render($response, 'auth/change.twig');
    }

    public function postChangePassword($request, $response)
    {


    }

}