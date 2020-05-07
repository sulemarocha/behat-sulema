<?php

declare(strict_types=1);

namespace LaSalleTest\ChupiProject\Module\Color\Application;


use LaSalle\ChupiProject\Module\Color\Application\RandomColorSearcher;
use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\NotExistColorException;
use LaSalleTest\ChupiProject\Module\Color\Infraestructure\ColorEmptyRepositoryStub;
use LaSalleTest\ChupiProject\Module\Color\Infraestructure\ColorRepositoryStub;
use PHPUnit\Framework\TestCase;

final class RandomColorSearcherTest extends TestCase
{
    /**
     * @test
     */
    public function isColorValid()
    {
        $inMemoryColorRepository =  new ColorRepositoryStub();
        $randomColorSearcher = new RandomColorSearcher($inMemoryColorRepository);
        $color = $randomColorSearcher();
        $arrayColors = ['red', 'cyan', 'magenta'];
        $this->assertContains($color, $arrayColors, 'Not is a color!');
    }
    /**
     * @test
     */
    public function notExistColor()
    {
        $this->expectException(NotExistColorException::class);

        $inMemoryRepository = new ColorEmptyRepositoryStub();
        $randomColorSearcher = new RandomColorSearcher($inMemoryRepository);
        $color = $randomColorSearcher();

    }
}