<?php


namespace LaSalleTest\ChupiProject\Module\Color\Application;


use LaSalle\ChupiProject\Module\Color\Application\RandomColorSearcher;
use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\NotExistColorException;
use LaSalleTest\ChupiProject\Module\Color\Infraestructure\InMemoryColorEmptyRepositoryStub;
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
    /**
     * @test
     */
    public function notExistColor()
    {
        $this->expectException(NotExistColorException::class);

        $inMemoryRepository = new InMemoryColorEmptyRepositoryStub();
        $randomColorSearcher = new RandomColorSearcher($inMemoryRepository);
        $color = $randomColorSearcher();

    }
}