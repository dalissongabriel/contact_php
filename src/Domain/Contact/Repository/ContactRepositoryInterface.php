<?php


namespace App\Netshowme\Domain\Contact\Repository;


use App\Netshowme\Domain\Contact\Entity\Contact;

interface ContactRepositoryInterface
{
    public function add(Contact $contact);
}