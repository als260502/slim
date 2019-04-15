<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 15/04/2019
 * Time: 15:29
 */

namespace App\Middleware;


class ValidationErrorMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {

        //$this->container->view->addAttribute('errors', $_SESSION['errors']);

        //unset($_SESSION['errors']);

        $response = $next($request, $response);

        return $response;
    }

}