<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 16/04/2019
 * Time: 10:58
 */

namespace App\Middleware;


class OldInputMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {

        $this->container->view->getEnvironment()->addGlobal('old', @$_SESSION['old']);

        $_SESSION['old'] = $request->getParams();

        $response = $next($request, $response);

        return $response;
    }
}