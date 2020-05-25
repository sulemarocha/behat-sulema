<?php

namespace LaSallePublic\ChupiProject\Controllers;

class BaseController
{
    private $dc;
    public function __construct(array $dc)
    {
        $this->dc = $dc;
    }
}