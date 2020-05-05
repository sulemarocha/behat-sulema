<?php


namespace LaSalleTest\ChupiProject\Module\CoolWord\Infrastructure;


use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;

class InMemoryCoolWordRepositoryStub implements CoolWordRepository
{

    public function all(): array
    {
        // TODO: Implement all() method.
        return ["loquesea", "saludos"];
    }
}