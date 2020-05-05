<?php


namespace LaSalleTest\ChupiProject\Module\Color\Infraestructure;


use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;

class InMemoryColorRepositoryDummy implements ColorRepository
{
    public function all(): array
    {
        return [];
    }
    
}