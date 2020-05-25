<?php


namespace LaSallePublic\ChupiProject\Controllers;


use LaSalle\ChupiProject\Module\Color\Application\RandomColorSearcher;
use LaSalle\ChupiProject\Module\Color\Infrastructure\InMemoryColorRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ColorController extends BaseController
{
    private $getRandomColor;
    public function __construct(array $dc)
    {
        parent::__construct($dc);
        $this->getRandomColor = new RandomColorSearcher(new InMemoryColorRepository());
    }

    public function __invoke(Request $request): Response
    {
        $colorGenerated = $this->getRandomColor->__invoke();
        return Response::create($colorGenerated, 200);
    }
}