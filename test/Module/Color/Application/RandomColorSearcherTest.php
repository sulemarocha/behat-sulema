<?php


namespace LaSalleTest\ChupiProject\Module\Color\Application;


use LaSalle\ChupiProject\Module\Color\Application\RandomColorSearcher;
use LaSalleTest\ChupiProject\Module\Color\Infraestructure\InMemoryColorRepository;
use PHPUnit\Framework\TestCase;

final class RandomColorSearcherTest extends TestCase
{
    /**
     * @test
     */
    public function isColorValid(){
        $inMemoryColorRepository =  new InMemoryColorRepository();
        $randomColorSearcher = new RandomColorSearcher($inMemoryColorRepository);
        $color = $randomColorSearcher();
        $arrayColors = ['red', 'cyan', 'magenta', 'green', 'black', 'yellow', 'blue', 'light_gray'];
        $this->assertContains($color, $arrayColors, 'Not is a color!');
    }

    /**
     * @test
     */
    public function notEmptyColor(){
        $inMemoryColorRepository =  new InMemoryColorRepository();
        $randomColorSearcher = new  RandomColorSearcher($inMemoryColorRepository);
        $color = $randomColorSearcher();
        $this->assertNotEmpty($color, 'The color is null!');
    }
}