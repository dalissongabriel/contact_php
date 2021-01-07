<?php


namespace App\Netshowme\Domain\Share\ValueObjects;


use App\Netshowme\Domain\Share\Exceptions\InvalidEmailException;
use App\Netshowme\Domain\Share\Helpers\EmailValidator;

class Email
{
    private string $address;

    /**
     * Email constructor.
     * @param string $address
     */
    public function __construct(string $address)
    {
        $this->setEmail($address);
    }

    private function setEmail(string $address): self
    {
        if(!EmailValidator::isValid($address)){
            throw new InvalidEmailException($address);
        }
        $this->address = $address;
        return $this;
    }

    public function __toString()
    {
        return (string) $this->address;
    }

}