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
        \DateTimeImmutable $createdAt,
        string $message,
        string $phone,
        string $file
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->createdAt = $createdAt;
        $this->message = $message;
        $this->phone = $phone;
        $this->file = $file;
    }
}