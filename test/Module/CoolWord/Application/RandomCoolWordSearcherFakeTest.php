<?php


namespace LaSalleTest\ChupiProject\Module\CoolWord\Application;


use LaSalle\ChupiProject\Module\CoolWord\Application\RandomCoolWordSearcher;
use LaSalleTest\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordRepository;
use PHPUnit\Framework\TestCase;

class RandomCoolWordSearcherFakeTest extends TestCase
{
    /**
     * @test
     */
    public function existCoolWordFake(){
        $inMemoryCoolWordRepository = new InMemoryCoolWordRepository();
        $randomCoolWordSearcher = new RandomCoolWordSearcher($inMemoryCoolWordRepository);
        $coolWord = $randomCoolWordSearcher();

        $arrayCoolWord = $inMemoryCoolWordRepository->all();

        $this->assertContains($coolWord, $arrayCoolWord, 'not is cool word');

    }
}