<?php

namespace App\Netshowme\Domain\Share\Helpers;

trait PhoneValidator
{
    public static function isValid(string $phone): bool
    {
        $regex_phone = "/\([0-9]{2}\) [0-9]{4}-[0-9]{4}/";
        return preg_match($regex_phone, $phone);
    }
}