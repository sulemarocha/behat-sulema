<?php


namespace LaSalleTest\ChupiProject\Module\CoolWord\Application;


use LaSalle\ChupiProject\Module\CoolWord\Application\RandomCoolWordSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Domain\Exceptions\NotExistCoolWordException;
use LaSalleTest\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordEmptyRepositoryStub;
use LaSalleTest\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordRepositoryStub;
use PHPUnit\Framework\TestCase;

class RandomCoolWordSearcherTest extends TestCase
{
    /**
     * @test
     */
    public function existCoolWord(){
        $inMemoryCoolWordRepository = new InMemoryCoolWordRepositoryStub();
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
        $inMemoryCoolWordRepository = new InMemoryCoolWordEmptyRepositoryStub();
        $randomCoolWordSearcher = new RandomCoolWordSearcher($inMemoryCoolWordRepository);
        $coolWord= $randomCoolWordSearcher();
    }

}