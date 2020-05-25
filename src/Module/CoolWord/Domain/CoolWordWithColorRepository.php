<?php


namespace LaSalle\ChupiProject\Module\CoolWord\Domain;


interface CoolWordWithColorRepository
{
    public function getCoolWord(string $color, string $word, string $bgColor): array;
}