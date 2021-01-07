<?php


namespace App\Netshowme\Infra\Controllers;


use App\Netshowme\Infra\Helpers\HtmlRenderHelper;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ContactFormController implements RequestHandlerInterface
{
    use HtmlRenderHelper;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = $this->render("ContactFormView.php");
        return New Response(200, [] /*Headers*/, $data);
    }
}