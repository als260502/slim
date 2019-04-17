<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 16/04/2019
 * Time: 12:28
 */

namespace App\Middleware;


class GuestMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {
        
        //check if the user is not signed in
        if($this->container->auth->check())
        {           
            return $response->withRedirect($this->container->router->pathFor('home'));
        }
        
        $response = $next($request, $response);

        return $response;
    }
}