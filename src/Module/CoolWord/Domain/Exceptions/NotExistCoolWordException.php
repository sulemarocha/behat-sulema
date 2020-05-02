<?php


namespace LaSalle\ChupiProject\Module\CoolWord\Domain\Exceptions;


use DomainException;
use Throwable;

class NotExistCoolWordException extends DomainException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($this->errorMessage());
    }
    public function errorMessage(){
        return "Cool Word is Empty!";
    }
}