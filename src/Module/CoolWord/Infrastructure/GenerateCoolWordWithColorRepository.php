<?php


namespace LaSalle\ChupiProject\Module\CoolWord\Infrastructure;


use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordWithColorRepository;

class GenerateCoolWordWithColorRepository implements CoolWordWithColorRepository
{

    public function getCoolWord(string $color, string $word, string $bgcolor): array
    {
        $coolWordArray = ['textColor'=> $color, 'coolWord'=>$word, 'bgColor'=>$bgcolor];
        return $coolWordArray;
    }
}