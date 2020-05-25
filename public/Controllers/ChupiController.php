<?php


namespace LaSallePublic\ChupiProject\Controllers;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ChupiController extends BaseController
{
    public function __invoke(Request $request): Response
    {
        return Response::create('word formato json', 200);
    }
}