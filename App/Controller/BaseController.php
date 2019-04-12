<?php

namespace App\Controller;

use Slim\Views\PhpRenderer;
use Slim\Container;

class BaseController {

    protected $container;

    public function __construct( $container )
    {
        $this->container = $container;        
    }


    public function __get($property)
    {
        if($this->container->{$property})
            return $this->container->{$property};
        
    }

}