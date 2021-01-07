<?php


namespace App\Netshowme\Domain\Contact\Entity;

use App\Netshowme\Domain\Share\ValueObjects\Email;
use DateTimeImmutable;

class ContactEntity
{
    private ?int $id = null;
    private string $name;
    private Email $email;
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
        $this->email = new Email($email);
        $this->createdAt = (new DateTimeImmutable())->format("Y-m-d H:i:s");
        $this->message = $message;
        $this->phone = $phone;
        $this->file = $file;
        $this->host = $host;
    }
}