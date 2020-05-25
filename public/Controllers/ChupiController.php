<?php


namespace LaSallePublic\ChupiProject\Controllers;


use LaSalle\ChupiProject\Module\Color\Application\RandomColorSearcher;
use LaSalle\ChupiProject\Module\Color\Infrastructure\InMemoryColorRepository;
use LaSalle\ChupiProject\Module\CoolWord\Application\RandomCoolWordSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Application\RandomCoolWordWithColor;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\GenerateCoolWordWithColorRepository;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ChupiController extends BaseController
{
    private $coolWordWithColor;
    private $randomColorSearcher;
    private $randomCoolWordSearcher;
    public function __construct(array $dc)
    {
        parent::__construct($dc);
        $this->coolWordWithColor = new RandomCoolWordWithColor(new GenerateCoolWordWithColorRepository());
        $this->randomColorSearcher = new RandomColorSearcher(new InMemoryColorRepository());
        $this->randomCoolWordSearcher = new RandomCoolWordSearcher(new InMemoryCoolWordRepository());
    }

    public function __invoke(Request $request): Response
    {
        $randomColor = $this->randomColorSearcher->__invoke();
        $randomCoolWord = $this->randomCoolWordSearcher->__invoke();

        $arrayRandomCoolWord = $this->coolWordWithColor->__invoke($this->randomColorSearcher, $this->randomCoolWordSearcher);
        return Response::create(json_encode($arrayRandomCoolWord), 200);
    }
}