<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 16/04/2019
 * Time: 11:38
 */

namespace App\Validation\Exceptions;


use Respect\Validation\Exceptions\ValidationException;

class EmailAvailableException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD =>'Email is already taken',
        ],
    ];

}