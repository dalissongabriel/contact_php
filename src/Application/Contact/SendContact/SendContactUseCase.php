<?php


namespace App\Netshowme\Application\Contact\SendContact;


use App\Netshowme\Domain\Contact\Entity\Contact;
use App\Netshowme\Domain\Contact\Repository\ContactRepositoryInterface;
use App\Netshowme\Domain\Contact\Services\SendEmailServiceInterface;
use App\Netshowme\Infra\Share\Helpers\FlashMessageTrait;
use Exception;

class SendContactUseCase
{
    private SendContactDTO $contactDTO;
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

    public function execute(SendContactDTO $contactDTO)
    {
        $this->contactDTO = $contactDTO;
        $contact = null;
        try {
            $contact = new Contact(
                $contactDTO->name,
                $contactDTO->email,
                $contactDTO->message,
                $contactDTO->phone,
                $contactDTO->host
            );
        } catch (Exception $exception) {
            FlashMessageTrait::setMessage(true,"danger", "Desculpe :( ... Ocorreu um erro ao tentar salvar sua mensagem de contato.");
            return;
        }


        if($contactDTO->file) {
            $contact->addFile($contactDTO->file);
        }

        try {
            $this->contactRepository->add($contact);
        } catch (Exception $exception) {
            FlashMessageTrait::setMessage(true, "danger,","Desculpe :( ... Ocorreu um erro ao tentar salvar sua mensagem de contato.");
        }

        try {
            $this->sendEmailService->send($contact);
            FlashMessageTrait::setMessage(false,"success","Obrigado :) Seu contato foi enviado.");
        } catch (Exception $exception) {
            FlashMessageTrait::setMessage(true, "danger","Desculpe :( ... Ocorreu um erro ao tentar enviar sua mensagem de contato.");
        }

    }
}