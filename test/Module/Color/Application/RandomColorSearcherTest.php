<?php


namespace LaSalleTest\ChupiProject\Module\Color\Application;


use LaSalle\ChupiProject\Module\Color\Application\RandomColorSearcher;
use LaSalleTest\ChupiProject\Module\Color\Infraestructure\InMemoryColorRepositoryStub;
use PHPUnit\Framework\TestCase;

final class RandomColorSearcherTest extends TestCase
{
    /**
     * @test
     */
    public function isColorValid(){
        $inMemoryColorRepository =  new InMemoryColorRepositoryStub();
        $randomColorSearcher = new RandomColorSearcher($inMemoryColorRepository);
        $color = $randomColorSearcher(); //["blue", "green"]
        $arrayColors = ['red', 'cyan', 'magenta', 'green', 'black', 'yellow', 'blue', 'light_gray'];
        $this->assertContains($color, $arrayColors, 'Not is a color!');
    }

}