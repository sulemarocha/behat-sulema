<?php


namespace LaSalleTest\ChupiProject\Module\CoolWord\Infrastructure;


use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;

class CoolWordRepositoryFake implements CoolWordRepository
{
    private $list = [];
    public function __construct()
    {
        $this->list = [
            'Chachi pistachi!',
            'Esto mola mogollón, tío!',
            'Mola mazo!',
            'Eres mazo guay',
            'Holiiiiii',
            'Besiis',
        ];
    }

    public function all(): array
    {
        // TODO: Implement all() method.
        return $this->list;
    }
}