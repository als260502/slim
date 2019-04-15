<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 15/04/2019
 * Time: 15:27
 */

namespace App\Middleware;


class Middleware
{

    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

}