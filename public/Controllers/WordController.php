<?php


namespace LaSallePublic\ChupiProject\Controllers;


use LaSalle\ChupiProject\Module\CoolWord\Application\RandomCoolWordSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WordController extends BaseController
{
    private $getCoolWord;
    public function __construct(array $dc)
    {
        parent::__construct($dc);
        $this->getCoolWord = new RandomCoolWordSearcher(new InMemoryCoolWordRepository());
    }

    public function __invoke(Request $request): Response
    {
        $coolWordGenerated = $this->getCoolWord->__invoke();
        return Response::create($coolWordGenerated, 200);
    }
}