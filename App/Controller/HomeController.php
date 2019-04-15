<?php

namespace App\Controller;


class HomeController extends BaseController {

    public function index($request, $response, $args)
    {

            $this->view->render($response, 'home.twig');

    }

}