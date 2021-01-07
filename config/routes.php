<?php

use App\Netshowme\Infra\Controllers\ContactFormController;
use App\Netshowme\Infra\Controllers\ContactPersistController;

return [
    "/contato"=> ContactFormController::class,
    "/contato/enviar"=> ContactPersistController::class];