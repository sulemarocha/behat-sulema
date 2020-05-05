<?php


namespace LaSalle\ChupiProject\Module\Color\Domain\Exceptions;

use DomainException;
use Throwable;

class NotExistColorException extends DomainException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($this->errorMessage());
    }
    public function errorMessage(){
        return "Color is Empty!";
    }
}