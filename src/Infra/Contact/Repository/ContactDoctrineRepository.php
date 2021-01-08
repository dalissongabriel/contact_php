<?php


namespace App\Netshowme\Infra\Contact\Repository;


use App\Netshowme\Domain\Contact\Entity\Contact;
use App\Netshowme\Domain\Contact\Repository\ContactRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class ContactDoctrineRepository implements ContactRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    public function add(Contact $contact)
    {
        $this->entityManager->persist($contact);
        $this->entityManager->flush();
    }
}