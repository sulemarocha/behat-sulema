<?php

require_once __DIR__ . '/vendor/autoload.php';

use LaSallePublic\ChupiProject\Controllers\ChupiController;
use LaSallePublic\ChupiProject\Controllers\WordController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Request;


use LaSallePublic\ChupiProject\Controllers\HomeController;
use LaSallePublic\ChupiProject\Controllers\ColorController;

/*
 * -----------
 * | Routing |
 * -----------
 */
$routes = [
    'home'      => (new Route('/',           ['controller' => HomeController::class]))->setMethods([Request::METHOD_GET]),
    'get_color'  => (new Route('/color',     ['controller' => ColorController::class]))->setMethods([Request::METHOD_GET]),
    'get_word'  => (new Route('/cool-word',     ['controller' => WordController::class]))->setMethods([Request::METHOD_GET]),
    'get_chupi_json'  => (new Route('/chupi_json',     ['controller' => ChupiController::class]))->setMethods([Request::METHOD_GET]),
];

/*
 * ------------
 * | Dispatch |
 * ------------
 */
$rc = new RouteCollection();
foreach ($routes as $key => $route) {
    $rc->add($key, $route);
}
$context = new RequestContext();
$matcher = new UrlMatcher($rc, $context);
$request = Request::createFromGlobals();
$context->fromRequest($request);
$dc = [];
try {
    $attributes = $matcher->match($context->getPathInfo());
    $ctrlName = $matcher->match($context->getPathInfo())['controller'];
    $ctrl = new $ctrlName($dc);
    $request->attributes->add($attributes);
    if (isset($matcher->match($context->getPathInfo())['method'])) {
        $response = $ctrl->{$matcher->match($context->getPathInfo())['method']}($request);
    } else {
        $response = $ctrl($request);
    }
} catch (ResourceNotFoundException $e) {
    $response = new Response('Not found!', Response::HTTP_NOT_FOUND);
}

$response->send();
