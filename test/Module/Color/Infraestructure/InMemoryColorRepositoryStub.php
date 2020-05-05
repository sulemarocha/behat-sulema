<?php


namespace LaSalleTest\ChupiProject\Module\Color\Infraestructure;


use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;

class InMemoryColorRepositoryStub implements ColorRepository
{

    public function all(): array
    {
        // TODO: Implement all() method.
        return ['red', 'cyan', 'magenta'];
    }
}