<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 16/04/2019
 * Time: 11:16
 */

namespace App\Validation\Rules;



use App\Model\User;
use Respect\Validation\Rules\AbstractRule;

class MatchesPassword extends AbstractRule
{
    protected $password;

    public function __construct($password){

        $this->password =  $password;

    }

    public function validate($input)
    {
       return password_verify($input, $this->password);
    }

}