<?php


namespace LaSalleTest\ChupiProject\Module\CoolWord\Infrastructure;


use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;

class InMemoryCoolWordEmptyRepositoryStub implements CoolWordRepository
{

    public function all(): array
    {
        // TODO: Implement all() method.
        return [];
    }
}