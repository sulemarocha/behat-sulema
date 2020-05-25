<?php


namespace LaSallePublic\ChupiProject\Controllers;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WordController extends BaseController
{
    public function __invoke(Request $request): Response
    {
        // TODO: Implement __invoke() method.
        return Response::create('Color', 200);
    }
}