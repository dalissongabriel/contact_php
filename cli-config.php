<?php

use App\Netshowme\Infra\EntityManagerCreator;
use Doctrine\ORM\Tools\Console\ConsoleRunner;


require_once __DIR__ . '/vendor/autoload.php';

$entityManagerFactory = new EntityManagerCreator();
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);