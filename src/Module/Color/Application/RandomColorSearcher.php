<?php

namespace LaSalle\ChupiProject\Module\Color\Application;

use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;
use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\NotExistColorException;

final class RandomColorSearcher
{
    private $colorRepository;

    public function __construct(ColorRepository $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

    public function __invoke()
    {
        $colors = $this->colorRepository->all();
        if(empty($colors)){
            throw new NotExistColorException();
        }
        return $colors[mt_rand(0, count($colors) - 1)];
    }
}
