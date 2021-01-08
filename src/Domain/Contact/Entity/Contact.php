<?php


namespace App\Netshowme\Domain\Contact\Entity;

use App\Netshowme\Domain\Share\ValueObjects\Email;
use App\Netshowme\Domain\Share\ValueObjects\File;
use App\Netshowme\Domain\Share\ValueObjects\Phone;
use DateTimeImmutable;
use Psr\Http\Message\UploadedFileInterface;


class Contact
{
    private ?int $id = null;
    private string $name;
    private Email $email;
    private DateTimeImmutable $createdAt;
    private string $message;
    private Phone $phone;
    private File $file;

    public function __construct(
        string $name,
        string $email,
        string $message,
        string $phone,
        string $host
    )
    {
        $this->name = $name;
        $this->email = new Email($email);
        $this->createdAt = new DateTimeImmutable();
        $this->message = $message;
        $this->phone = new Phone($phone);
        $this->host = $host;
    }
    public  function getFullMessage(): string
    {
         return "Nome: {$this->name} \n" .
        "E-mail para contato: {$this->email} \n" .
        "Telefone para contato: {$this->phone} \n" .
        "IP: {$this->host} \n" .
        "Mensagem: {$this->message}.";
    }

    public function getFile(): File
    {
        return $this->file;
    }

    public function addFile(UploadedFileInterface $uploadedFile): self
    {
        $this->file = $uploadedFile;
        return $this;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }
}