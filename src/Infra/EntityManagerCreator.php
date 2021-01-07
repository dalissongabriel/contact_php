<?php

namespace App\Netshowme\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__ . '/Mappings'];
        $isDevMode = false;

        $dbParams = array(
            'driver' => 'pdo_pgsql',
            'host'=>'localhost',
            'port'=>'5432',
            'user'=>'alissongabriel',
            'password'=>'inoino',
            'dbname'=>'netshowme_phpteste'
        );

        $config = Setup::createXMLMetadataConfiguration(
            $paths,
            $isDevMode
        );
        return EntityManager::create($dbParams, $config);

    }
}