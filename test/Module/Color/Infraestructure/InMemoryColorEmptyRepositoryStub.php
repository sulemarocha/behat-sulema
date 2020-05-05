<?php


namespace LaSalleTest\ChupiProject\Module\Color\Infraestructure;


use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;

class InMemoryColorEmptyRepositoryStub implements ColorRepository
{

    public function all(): array
    {
        // TODO: Implement all() method.
        return [];
    }
}