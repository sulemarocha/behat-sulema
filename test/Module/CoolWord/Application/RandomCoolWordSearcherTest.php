<?php


namespace LaSalleTest\ChupiProject\Module\CoolWord\Application;


use LaSalle\ChupiProject\Module\CoolWord\Application\RandomCoolWordSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Domain\Exceptions\NotExistCoolWordException;
use LaSalleTest\ChupiProject\Module\CoolWord\Infrastructure\CoolWordEmptyRepositoryStub;
use LaSalleTest\ChupiProject\Module\CoolWord\Infrastructure\CoolWordRepositoryStub;
use PHPUnit\Framework\TestCase;

class RandomCoolWordSearcherTest extends TestCase
{
    /**
     * @test
     */
    public function existCoolWord(){
        $inMemoryCoolWordRepository = new CoolWordRepositoryStub();
        $randomCoolWordSearcher = new RandomCoolWordSearcher($inMemoryCoolWordRepository);
        $coolWord= $randomCoolWordSearcher();
        $this->assertNotEmpty($coolWord, "Cool Word is Empty!");
    }
    /**
     * @test
     */
    public function notExistCoolWord()
    {
        $this->expectException(NotExistCoolWordException::class);
        $inMemoryCoolWordRepository = new CoolWordEmptyRepositoryStub();
        $randomCoolWordSearcher = new RandomCoolWordSearcher($inMemoryCoolWordRepository);
        $coolWord= $randomCoolWordSearcher();
    }

}