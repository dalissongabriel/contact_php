<?php

namespace App\Netshowme\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Symfony\Component\Dotenv\Dotenv;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {

        $paths = [__DIR__ . '/Mappings'];
        $isDevMode = false;

        $host = isset($_ENV["DB_HOST"]) ? $_ENV["DB_HOST"]:"localhost";
        $user = isset($_ENV["DB_USER"]) ? $_ENV["DB_USER"]:"postgres";
        $port = isset($_ENV["DB_PORT"]) ? $_ENV["DB_PORT"]:"5432";
        $pass = "";
        if (!isset($_ENV["DB_PASS"])) {
            throw new \UnexpectedValueException("No password provided for database connection");
        } else {
            $pass = $_ENV["DB_PASS"];
        }
        $dbname = "";
        if (!isset($_ENV["DB_NAME"])) {
            throw new \UnexpectedValueException("No database name provided for database connection");
        } else {
            $dbname = $_ENV["DB_NAME"];
        }


        $dbParams = array(
            'driver' => 'pdo_pgsql',
            'host'=> $host,
            'port'=> $port,
            'user'=> $user,
            'password'=> $pass,
            'dbname'=>$dbname
        );

        $config = Setup::createXMLMetadataConfiguration(
            $paths,
            $isDevMode
        );
        return EntityManager::create($dbParams, $config);

    }
}