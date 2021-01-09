<?php


namespace App\Netshowme\Infra\Contact\Controllers;


use App\Netshowme\Application\Contact\SendContact\SendContactDTO;
use App\Netshowme\Application\Contact\SendContact\SendContactUseCase;
use App\Netshowme\Domain\Contact\Repository\ContactRepositoryInterface;
use App\Netshowme\Domain\Contact\Services\SendEmailServiceInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ContactPersistController implements RequestHandlerInterface
{
    /**
     * @var ContactRepositoryInterface
     */
    private ContactRepositoryInterface $contactRepository;
    /**
     * @var SendEmailServiceInterface
     */
    private SendEmailServiceInterface $sendEmailService;

    public function __construct(ContactRepositoryInterface $contactRepository, SendEmailServiceInterface $sendEmailService)
    {
        $this->contactRepository = $contactRepository;
        $this->sendEmailService = $sendEmailService;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $useCase = new SendContactUseCase($this->contactRepository, $this->sendEmailService);
        $contactDTO = $this->fillContactDto($request);
        $useCase->execute($contactDTO);

        return new Response(200,["Location"=>"/contato"]);
    }

    private function fillContactDto(ServerRequestInterface $request): SendContactDTO
    {

        $body = $request->getParsedBody();
        $name = filter_var($body["name"], FILTER_SANITIZE_STRING);
        $message = filter_var($body['message'],FILTER_SANITIZE_STRING);
        $email = filter_var($body['email'], FILTER_SANITIZE_STRING);
        $phone = filter_var($body['phone'], FILTER_SANITIZE_STRING);
        $host = $_SERVER['REMOTE_ADDR'];

        $contactDto = new SendContactDTO($name, $email, $phone, $message, $host);

        if($request->getUploadedFiles()) {
            $contactDto->file = $request->getUploadedFiles()["file"];
        }


        return $contactDto;
    }
}