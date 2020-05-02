<?php

namespace LaSalle\ChupiProject\Module\CoolWord\Application;

use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;
use LaSalle\ChupiProject\Module\CoolWord\Domain\Exceptions\NotExistCoolWordException;

final class RandomCoolWordSearcher
{
    private $coolWordRepository;

    public function __construct(CoolWordRepository $coolWordRepository)
    {
        $this->coolWordRepository = $coolWordRepository;
    }

    public function __invoke(): string
    {
        $words = $this->coolWordRepository->all();
        if(empty($words)){
            throw new NotExistCoolWordException();
        }
        return $words[mt_rand(0, count($words) - 1)];
    }
}
