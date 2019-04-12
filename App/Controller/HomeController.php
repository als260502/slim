<?php

namespace App\Controller;

use App\Model\User;

class HomeController extends BaseController {

    public function index($request, $response, $args)
    {

         User::create([
             'name' => 'Fabiane',
             'email'=> 'fabiane@np.com.br',
             'password'=> '123',
             
         ]);    

       $this->view->render($response, 'index.phtml');
   

    }

}