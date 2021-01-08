<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__."/../vendor/autoload.php";

/**
 * Load .env variables
 */
$dotenv = new Dotenv();
$dotenv->load(__DIR__. "/../.env");

/**
 * Routing configuration
 */
$routes = require __DIR__ ."/../config/routes.php";

/**
 * Get resource accessed
 */
$resource = !isset($_SERVER["PATH_INFO"]) || $_SERVER['PATH_INFO'] == null
    ? "/contato"
    : $_SERVER["PATH_INFO"];

/**
 * Validate the route
 */
if(!array_key_exists($resource, $routes)) {
    http_response_code(404);
    $resource="/errors/404";
}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

/**
 * Shapes the request in the standard interface
 */
$request = $creator->fromGlobals();

/**
 * Get the class that controls the route
 */
$ControllerClass = $routes[$resource];


/** @var ContainerInterface $container */
$container = require_once __DIR__ . "/../config/dependencies.php";

/** @var RequestHandlerInterface $controller */

$controller = $container->get($ControllerClass);


/**
 * Get Response
 */
$response = $controller->handle($request);

/**
 * Add headers in response
 */
foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

/**
 * Send Responnse
 */
echo $response->getBody();