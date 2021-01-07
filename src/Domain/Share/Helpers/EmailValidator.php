<?php


namespace App\Netshowme\Domain\Share\Helpers;


trait EmailValidator
{
    public static function isValid($address): bool
    {
        if (filter_var($address, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
}