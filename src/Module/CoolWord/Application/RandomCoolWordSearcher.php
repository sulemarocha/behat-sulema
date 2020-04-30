<?php

namespace LaSalle\ChupiProject\Module\CoolWord\Application;

use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;

final class RandomCoolWordSearcher
{
    private $repository;

    public function __construct(CoolWordRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): string
    {
        $words = $this->repository->all();

        return $words[mt_rand(0, count($words) - 1)];
    }
}
