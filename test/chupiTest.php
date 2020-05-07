<?php


namespace LaSalleTest\ChupiProject;


use Colors\Color;
use LaSalle\ChupiProject\Module\Color\Application\RandomColorSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Application\RandomCoolWordSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Domain\Exceptions\NotExistCoolWordException;
use LaSalleTest\ChupiProject\Module\Color\Infraestructure\ColorRepositoryDummy;
use LaSalleTest\ChupiProject\Module\Color\Infraestructure\InMemoryColorRepositorySpy;
use LaSalleTest\ChupiProject\Module\Color\Infraestructure\ColorRepositoryStub;
use LaSalleTest\ChupiProject\Module\CoolWord\Infrastructure\CoolWordRepositoryStub;
use PHPUnit\Framework\TestCase;

class chupiTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRandomCoolWordSearcher()
    {
        $inMemoryColorRepository = new ColorRepositoryDummy();
        $randomColorSearcher = new RandomColorSearcher($inMemoryColorRepository);

        $inMemoryCoolWord = new CoolWordRepositoryStub();
        $randomCoolWordSearcher = new RandomCoolWordSearcher($inMemoryCoolWord);

        $coolWord = $randomCoolWordSearcher();
        $this->assertNotEmpty($coolWord, "Cool word is Empty!");

    }

}