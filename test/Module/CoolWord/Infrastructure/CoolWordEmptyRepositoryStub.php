<?php

declare(strict_types=1);

namespace LaSalleTest\ChupiProject\Module\CoolWord\Infrastructure;


use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;

class CoolWordEmptyRepositoryStub implements CoolWordRepository
{

    public function all(): array
    {
        // TODO: Implement all() method.
        return [];
    }
}