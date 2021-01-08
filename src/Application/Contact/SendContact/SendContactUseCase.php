<?php


namespace App\Netshowme\Application\Contact\SendContact;


use App\Netshowme\Domain\Contact\Entity\Contact;
use App\Netshowme\Domain\Contact\Repository\ContactRepositoryInterface;
use App\Netshowme\Domain\Contact\Services\SendEmailServiceInterface;
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
        $contact = new Contact(
            $contactDTO->name,
            $contactDTO->email,
            $contactDTO->message,
            $contactDTO->phone,
            $contactDTO->file,
            $contactDTO->host
        );

        $this->contactRepository->add($contact);

        $this->sendEmailService->send($contact);

    }
}