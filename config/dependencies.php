<?php

use App\Netshowme\Domain\Contact\Repository\ContactRepositoryInterface;
use App\Netshowme\Domain\Contact\Services\SendEmailServiceInterface;
use App\Netshowme\Infra\Contact\Repository\ContactDoctrineRepository;
use App\Netshowme\Infra\Contact\Services\SendEmailSwiftMailerService;
use App\Netshowme\Infra\EntityManagerCreator;
use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;

$containerBuilder = new ContainerBuilder();

/** @var EntityManagerInterface $entityManager */
$entityManager = (new EntityManagerCreator())->getEntityManager();

$containerBuilder->addDefinitions([
    SendEmailServiceInterface::class => fn() => new SendEmailSwiftMailerService(),
    ContactRepositoryInterface::class => fn() => new ContactDoctrineRepository($entityManager)
    ]
);

return $containerBuilder->build();