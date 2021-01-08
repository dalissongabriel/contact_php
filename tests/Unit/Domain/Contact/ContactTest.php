<?php


namespace Tests\Netshowme\Unit\Domain\Contact;


use App\Netshowme\Domain\Contact\Entity\Contact;
use App\Netshowme\Domain\Share\Exceptions\InvalidEmailException;
use Nyholm\Psr7\UploadedFile;
use PHPUnit\Framework\TestCase;
use function DI\string;

class ContactTest extends TestCase
{
    public function testMustEnsureContactHasRequiredFields()
    {

        $name="test";
        $email="test@test.com";
        $message="test";
        $phone="(99) 999999999";
        $host="127.0.0.1";

        $contact = new Contact($name, $email, $message, $phone, $host);
        $this->assertSame("test@test.com", (string) $contact->getEmail());
        $this->assertSame("(99) 999999999", (string) $contact->getPhone());
    }

    public function testMustEnsureContactThrownExceptionWhenInvalidEmail()
    {
        $this->expectException(InvalidEmailException::class);
        $name="test";
        $email="test@";
        $message="test";
        $phone="(99) 999999999";
        $host="127.0.0.1";

        $contact = new Contact($name, $email, $message, $phone, $host);
    }

}