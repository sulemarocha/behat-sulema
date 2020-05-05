<?php


namespace LaSalleTest\ChupiProject;


use Colors\Color;
use LaSalle\ChupiProject\Module\Color\Application\RandomColorSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Application\RandomCoolWordSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Domain\Exceptions\NotExistCoolWordException;
use LaSalleTest\ChupiProject\Module\Color\Infraestructure\InMemoryColorRepositorySpy;
use LaSalleTest\ChupiProject\Module\Color\Infraestructure\InMemoryColorRepositoryStub;
use LaSalleTest\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordRepositoryStub;
use PHPUnit\Framework\TestCase;

class chupiTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRandomCoolWordSearcher(){

        $inMemoryCoolWord = new InMemoryCoolWordRepositoryStub();
        $randomCoolWordSearcher = new RandomCoolWordSearcher($inMemoryCoolWord);

        $coolWord = $randomCoolWordSearcher();
        $this->assertNotEmpty($coolWord, "Cool word is Empty!");


    }

}