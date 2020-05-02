<?php


namespace LaSalleTest\ChupiProject;


use Colors\Color;
use LaSalle\ChupiProject\Module\Color\Application\RandomColorSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Application\RandomCoolWordSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Domain\Exceptions\NotExistCoolWordException;
use LaSalleTest\ChupiProject\Module\Color\Infraestructure\InMemoryColorRepository;
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

        $inMemoryColorRepository = new InMemoryColorRepository();
        $randomColorSearcher = new RandomColorSearcher($inMemoryColorRepository);

        $color = new Color();
        $fgColor = $this->_random_color_except_test($randomColorSearcher(), $randomColorSearcher);



        $coolWordExpect = $color( $randomCoolWordSearcher() )->bg($randomColorSearcher())->$fgColor . PHP_EOL;

        $this->assertNotEmpty("prueba", 'Is Empty Cool Word!');
    }
    function _random_color_except_test(string $except, callable $randomColorSearcher): string
    {
        $return = $except;

        while ($except === $return) {
            $return = $randomColorSearcher();
        }

        return $return;
    }
}