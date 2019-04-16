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

class EmailAvailable extends AbstractRule
{

    public function validate($input)
    {
       return User::where('email', $input)->count() === 0;
    }

}