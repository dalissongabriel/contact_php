<?php


namespace Tests\Netshowme\Unit\Domain\Contact;


use App\Netshowme\Domain\Contact\Entity\Contact;
use Nyholm\Psr7\UploadedFile;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    public function testMustEnsureContactHasEmailAddress()
    {

        $name="test";
        $email="test@test.com";
        $message="test";
        $phone="(99) 999999999";
        $host="127.0.0.1";

        $contact = new Contact($name, $email, $message, $phone, $host);
        $this->assertSame("test@test.com",(string) $contact->getEmail());
    }

}