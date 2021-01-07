<?php


namespace App\Netshowme\Infra\Controllers;


use App\Netshowme\Domain\Contact\Entity\ContactEntity;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
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
        $email = filter_var($body['email'], FILTER_SANITIZE_STRING);
        $phone = filter_var($body['phone'], FILTER_SANITIZE_STRING);
        $file = $request->getUploadedFiles()["file"];
        $host = $_SERVER['REMOTE_ADDR'];


        $contact = new ContactEntity($name, $email, $message, $phone, $file, $host);
        $this->entityManager->persist($contact);
        $this->entityManager->flush();

        return new Response(200,["Location"=>"/contato"]);
    }
}