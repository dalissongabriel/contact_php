<?php


namespace App\Netshowme\Infra\Contact\Services;


use App\Netshowme\Domain\Contact\Entity\Contact;
use App\Netshowme\Domain\Contact\Services\SendEmailServiceInterface;
use Swift_Mailer;

class SendEmailSwiftMailerService implements SendEmailServiceInterface
{
    public function sendFor(Contact $contact)
    {
        $smpt = isset($_ENV["SENDER_EMAIL_SMPT_TRANSPORT"])
            ? $_ENV["SENDER_EMAIL_SMPT_TRANSPORT"]
            : "smtp.googlemail.com";

        $port = isset($_ENV["SENDER_EMAIL_SMPT_PORT"])
            ? (int) $_ENV["SENDER_EMAIL_SMPT_PORT"]
            : 465;
        $username = "";
        if (isset($_ENV["SENDER_EMAIL_USERNAME"])) {
            $username = $_ENV["SENDER_EMAIL_USERNAME"];
        } else {
            throw new \UnexpectedValueException("No username sender provided for send email");
        }

        $receiver = "";
        if (isset($_ENV["RECEIVER_EMAIL_ADDRESS"])) {
            $receiver = $_ENV["RECEIVER_EMAIL_ADDRESS"];
        } else {
            throw new \UnexpectedValueException("No receiver provided for send email");
        }

        $password = "";
        if (isset($_ENV["SENDER_EMAIL_PASSWORD"])) {
            $password = $_ENV["SENDER_EMAIL_PASSWORD"];
        } else {
            throw new \UnexpectedValueException("No password sender provided for send email");
        }

        $transport = (new Swift_SmtpTransport($smpt, $port))
            ->setUsername($username)
            ->setPassword($password)
        ;

        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message('Página de contato - Teste em PHP da Netshow.me'))
            ->setFrom([$username])
            ->setTo([$receiver])
            ->setBody($contact->getFullMessage());
        ;
        $result = $mailer->send($message);
    }
}