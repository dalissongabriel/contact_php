<?php


namespace Tests\Netshowme\Unit\Domain\Contact;


use App\Netshowme\Domain\Contact\Entity\Contact;
use App\Netshowme\Domain\Share\Exceptions\InvalidEmailException;
use App\Netshowme\Domain\Share\Exceptions\InvalidPhoneException;
use Nyholm\Psr7\UploadedFile;
use PHPUnit\Framework\TestCase;
use function DI\string;

class ContactTest extends TestCase
{
    public function testMustEnsureContactHasRequiredFields()
    {

        $name="test nanem";
        $email="test@test.com";
        $message="test message";
        $phone="(99) 999999999";
        $host="127.0.0.1";

        $contact = new Contact($name, $email, $message, $phone, $host);

        $this->assertSame("test@test.com", (string) $contact->getEmail());
        $this->assertSame("(99) 999999999", (string) $contact->getPhone());
        $this->stringContains("test message", (string) $contact->getFullMessage());
        $this->stringContains("test nanem", (string) $contact->getFullMessage());
    }

    public function testMustEnsureDomainThrownExceptionWhenInvalidEmail()
    {
        $this->expectException(InvalidEmailException::class);
        $name="test";
        $email="test@";
        $message="test";
        $phone="(99) 999999999";
        $host="127.0.0.1";

        $contact = new Contact($name, $email, $message, $phone, $host);
    }

    public function testMustEnsureDomainThrownExceptionWhenInvalidPhone()
    {
        $this->expectException(InvalidPhoneException::class);
        $name="test";
        $email="test@teste.com";
        $message="test";
        $phone="(99) aaaaaaaa";
        $host="127.0.0.1";

        $contact = new Contact($name, $email, $message, $phone, $host);
    }

}