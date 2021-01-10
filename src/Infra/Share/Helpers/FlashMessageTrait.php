<?php


namespace App\Netshowme\Infra\Share\Helpers;


class FlashMessageTrait
{
    public static function setMessage(bool $error, string $type, string $message): void
    {
        $_SESSION['error'] = $error;
        $_SESSION['type']=$type;
        $_SESSION['message']=$message;
    }
}