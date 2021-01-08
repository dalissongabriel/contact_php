<?php

namespace App\Netshowme\Application\Contact\SendContact;

use Psr\Http\Message\UploadedFileInterface;

class SendContactDTO {
    public string $name;
    public string $email;
    public string $phone;
    public string $message;
    public UploadedFileInterface $file;
    public string $host;

    /**
     * SendContactDTO constructor.
     * @param string $name
     * @param string $email
     * @param string $phone
     * @param string $message
     * @param UploadedFileInterface $file
     * @param string $host
     */
    public function __construct(string $name, string $email, string $phone, string $message, UploadedFileInterface $file,string $host)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
        $this->file = $file;
        $this->host = $host;
    }


}