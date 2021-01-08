<?php


namespace App\Netshowme\Domain\Contact\Services;


use App\Netshowme\Domain\Contact\Entity\Contact;

interface SendEmailServiceInterface
{
    public function send(Contact $contact);
}