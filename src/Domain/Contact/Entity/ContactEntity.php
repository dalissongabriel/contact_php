<?php


namespace App\Netshowme\Domain\Contact\Entity;

use App\Netshowme\Domain\Share\ValueObjects\Email;
use App\Netshowme\Domain\Share\ValueObjects\Phone;
use DateTimeImmutable;

class ContactEntity
{
    private ?int $id = null;
    private string $name;
    private Email $email;
    private DateTimeImmutable $createdAt;
    private string $message;
    private Phone $phone;
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
        $this->createdAt = new DateTimeImmutable();
        $this->message = $message;
        $this->phone = new Phone($phone);
        $this->file = $file;
        $this->host = $host;
    }
}