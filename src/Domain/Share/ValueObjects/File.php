<?php


namespace App\Netshowme\Domain\Share\ValueObjects;


use App\Netshowme\Domain\Share\Exceptions\InvalidFileException;
use App\Netshowme\Domain\Share\Helpers\FileValidator;
use Psr\Http\Message\UploadedFileInterface;

class File
{
    private string $name;
    private string $filename;
    private int $size;
    private string $type;

    public function __construct(UploadedFileInterface $file)
    {
        if(!FileValidator::isValid($file->getSize(), $file->getClientMediaType())) {
            throw new InvalidFileException($file);
        }
        $this->generateRandomName($file);
        $this->saveFileInDisk($file);

        $this->type = $file->getClientMediaType();
        $this->size = $file->getSize();
    }

    private function saveFileInDisk(UploadedFileInterface $file)
    {
        $targetPath = __DIR__ . "/../../../../uploads/";
        $filename = $targetPath . $this->filename;
        $file->moveTo($filename);
    }

    private function generateRandomName(UploadedFileInterface $file)
    {
        $this->name =  $file->getClientFilename();
        $this->filename = md5(uniqid(rand(), true)) . $this->name;
    }

    public function getFileName(): string
    {
        return $this->filename;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->filename;
    }


}