<?php


namespace App\Netshowme\Domain\Share\Exceptions;

use DomainException;

class InvalidEmailException extends DomainException
{
    public function __construct($value)
    {
        $message = "Email: $value is invalid!";
        parent::__construct($message);
    }

}