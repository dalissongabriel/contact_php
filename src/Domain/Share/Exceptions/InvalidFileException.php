<?php


namespace App\Netshowme\Domain\Share\Exceptions;


use DomainException;
use Psr\Http\Message\UploadedFileInterface;

class InvalidFileException extends DomainException
{

    public function __construct(UploadedFileInterface $file)
    {
        $size = $file->getSize() / 1000;
        $type = $file->getClientMediaType();
        $message = "File size or type invalid! Size: $size kb Type: $type";
        parent::__construct($message);
    }
}