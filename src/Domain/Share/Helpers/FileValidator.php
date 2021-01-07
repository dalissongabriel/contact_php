<?php


namespace App\Netshowme\Domain\Share\Helpers;


class FileValidator
{
    private static array $validTypes = [
        'application/pdf',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'text/plain',
        'application/msword'
       ];

    /**
     * @param string $size
     * @param string $type
     * @return bool
     *
     * Metódo para validar o tipo do arquivo
     */
    public static function isValid(int $size, string $type): bool
    {
        $sizeKb = $size / 1000;
        if (!$sizeKb || $sizeKb > 500 || $sizeKb <= 0){
           return false;
        }
        if (!in_array($type, self::$validTypes)) {
            return false;
        }
        return true;
    }
}