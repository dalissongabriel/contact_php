<?php


namespace App\Netshowme\Infra\Contact\Helpers;

trait HtmlRenderHelper
{
    public function render(string $template,?array $data = null): string
    {
        if($data) extract($data);
        $template = __DIR__ . '/../../Views/' . $template;
        ob_start();
        require $template;
        $html = ob_get_clean();
        return $html;
    }
}