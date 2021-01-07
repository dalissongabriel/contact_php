<?php


namespace App\Netshowme\Infra\Controllers;


use \DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ContactPersistController implements RequestHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $body = $request->getParsedBody();
        $name = filter_var($body["name"], FILTER_SANITIZE_STRING);
        $message = filter_var($body['message'],FILTER_SANITIZE_STRING);
        $email = filter_var($body['email'], FILTER_VALIDATE_EMAIL);
        $phone = filter_var($body['phone'], FILTER_SANITIZE_STRING);
        $file = $body['file'];
        $host = $_SERVER['REMOTE_ADDR'];
        $createdAt = (new DateTimeImmutable())->format("Y-m-d H:i:s");

        var_dump($name,$message,$email,$phone,$file,$host,$createdAt);
        die();


    }
}