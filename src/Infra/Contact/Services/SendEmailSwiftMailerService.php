<?php


namespace App\Netshowme\Infra\Contact\Services;


use App\Netshowme\Domain\Contact\Entity\Contact;
use App\Netshowme\Domain\Contact\Services\SendEmailServiceInterface;
use Swift_Attachment;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class SendEmailSwiftMailerService implements SendEmailServiceInterface
{
    public function send(Contact $contact)
    {
        $smpt = isset($_ENV["SENDER_EMAIL_SMPT_TRANSPORT"])
            ? $_ENV["SENDER_EMAIL_SMPT_TRANSPORT"]
            : "smtp.googlemail.com";

        $port = isset($_ENV["SENDER_EMAIL_SMPT_PORT"])
            ? (int) $_ENV["SENDER_EMAIL_SMPT_PORT"]
            : 465;

        if (!isset($_ENV["SENDER_EMAIL_USERNAME"])) {
            throw new \UnexpectedValueException("No sender provided for send email");
        }
        $username = $_ENV["SENDER_EMAIL_USERNAME"];

        if (!isset($_ENV["RECEIVER_EMAIL_ADDRESS"])) {
            throw new \UnexpectedValueException("No receiver provided for send email");
        }
        $receiver = $_ENV["RECEIVER_EMAIL_ADDRESS"];

        if (!isset($_ENV["SENDER_EMAIL_PASSWORD"])) {
            throw new \UnexpectedValueException("No password sender provided for send email");
        }
        $password = $_ENV["SENDER_EMAIL_PASSWORD"];

        $transport = (new Swift_SmtpTransport('smtp.googlemail.com', 465, 'ssl'))
            ->setUsername($username)
            ->setPassword($password)
        ;

        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message('Página de contato - Teste em PHP da Netshow.me'))
            ->setFrom([$username])
            ->setTo([$receiver])
            ->setBody($contact->getFullMessage());

        if($contact->hasFile()) {
            $message->attach(
                Swift_Attachment::fromPath(
                    __DIR__ . "/../../../../uploads/" .
                    $contact->getFile()->getFileName()
                )->setFilename($contact->getFile()->getName()));
        }

        $result = $mailer->send($message);

        if ($result !== 1) {
            throw new \Exception("Error to send e-mail");
        }

    }
}