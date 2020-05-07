<?php

declare(strict_types=1);

namespace LaSalleTest\ChupiProject\Module\Color\Infraestructure;


use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;

class ColorEmptyRepositoryStub implements ColorRepository
{

    public function all(): array
    {
        // TODO: Implement all() method.
        return [];
    }
}