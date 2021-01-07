<?php


namespace App\Netshowme\Domain\Entity;


use DateTimeImmutable;

class ContactEntity
{
    private ?int $id = null;
    private string $name;
    private string $email;
    private string $createdAt;
    private string $message;
    private string $phone;
    private string $file;

    public function __construct(
        string $name,
        string $email,
        string $message,
        string $phone,
        string $file,
        string $host
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->createdAt = (new DateTimeImmutable())->format("Y-m-d H:i:s");
        $this->message = $message;
        $this->phone = $phone;
        $this->file = $file;
        $this->host = $host;
    }
}