<?php

use App\Netshowme\Infra\EntityManagerCreator;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Symfony\Component\Dotenv\Dotenv;


require_once __DIR__ . '/vendor/autoload.php';

/**
 * Load .env variables
 */
$dotenv = new Dotenv();
$dotenv->load(__DIR__. "/.env");

$entityManagerFactory = new EntityManagerCreator();
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);