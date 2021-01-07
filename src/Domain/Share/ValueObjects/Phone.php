<?php


namespace App\Netshowme\Domain\Share\ValueObjects;


use App\Netshowme\Domain\Share\Exceptions\InvalidPhoneException;
use App\Netshowme\Domain\Share\Helpers\PhoneValidator;

class Phone
{
    private string $number;

    /**
     * Phone constructor.
     * @param string $number
     */
    public function __construct(string $number)
    {
        $this->setPhone($number);
    }

    private function setPhone(string $phone): self
    {
        if(!PhoneValidator::isValid($phone)){
            throw new InvalidPhoneException($phone);
        }

        $this->number = $phone;
        return $this;
    }


    public function __toString(): string
    {
        return $this->number;
    }
}