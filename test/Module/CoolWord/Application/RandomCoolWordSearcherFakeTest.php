<?php


namespace LaSalleTest\ChupiProject\Module\CoolWord\Application;


use LaSalle\ChupiProject\Module\CoolWord\Application\RandomCoolWordSearcher;
use LaSalleTest\ChupiProject\Module\CoolWord\Infrastructure\CoolWordRepositoryFake;
use PHPUnit\Framework\TestCase;

class RandomCoolWordSearcherFakeTest extends TestCase
{
    /**
     * @test
     */
    public function existCoolWordFake(){
        $inMemoryCoolWordRepository = new CoolWordRepositoryFake();
        $randomCoolWordSearcher = new RandomCoolWordSearcher($inMemoryCoolWordRepository);
        $coolWord = $randomCoolWordSearcher();

        $arrayCoolWord = $inMemoryCoolWordRepository->all();

        $this->assertContains($coolWord, $arrayCoolWord, 'not is cool word');

    }
}