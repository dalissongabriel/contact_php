<?php


use App\Netshowme\Infra\Contact\Controllers\ContactFormController;
use App\Netshowme\Infra\Contact\Controllers\ContactPersistController;

return [
    "/contato"=> ContactFormController::class,
    "/contato/enviar"=> ContactPersistController::class];