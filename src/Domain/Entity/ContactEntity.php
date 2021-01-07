<?php


namespace App\Netshowme\Domain\Entity;


class ContactEntity
{

    private string $name;
    private string $email;
    private \DateTimeImmutable $createdAt;
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