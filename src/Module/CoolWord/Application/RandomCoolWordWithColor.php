<?php


namespace LaSalle\ChupiProject\Module\CoolWord\Application;


use LaSalle\ChupiProject\Module\Color\Application\RandomColorSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordWithColorRepository;

class RandomCoolWordWithColor
{
    private $coolWordWithColorRepository;
    public function __construct(CoolWordWithColorRepository $coolWordWithColorRepository)
    {
        $this->coolWordWithColorRepository = $coolWordWithColorRepository;
    }
    public function __invoke(RandomColorSearcher $randomColor, RandomCoolWordSearcher $randomCoolWord): array
    {
        $textColor = $randomColor->__invoke();
        $coolWord = $randomCoolWord->__invoke();
        $bgColor = $this->generateBgColor($randomColor, $textColor);
        return $this->coolWordWithColorRepository->getCoolWord($textColor, $coolWord, $bgColor);
    }
    private function generateBgColor(RandomColorSearcher $randomColor, $textColor)
    {
        $colorGenerated = $randomColor->__invoke();
        if($colorGenerated != $textColor){
            return $colorGenerated;
        }
        return $this->generateBgColor($randomColor, $textColor);
    }

}