<?php
/**
 * Created by PhpStorm.
 * User: xiecong
 * Date: 19/4/27
 * Time: 23:21
 */

namespace App\Exceptions;


class ApiException extends \RuntimeException
{

    public function __construct(array $apiErr, Exception $previous = null)
    {
        $code = $apiErr[0];
        $message    = $apiErr[1];
        parent::__construct($message, $code, $previous);
    }

}