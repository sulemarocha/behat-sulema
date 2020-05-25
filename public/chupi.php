<?php require '../vendor/autoload.php';

use Colors\Color;
use LaSalle\ChupiProject\Module\Color\Application\RandomColorSearcher;
use LaSalle\ChupiProject\Module\Color\Infrastructure\InMemoryColorRepository;
use LaSalle\ChupiProject\Module\CoolWord\Application\RandomCoolWordSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Application\RandomCoolWordWithColor;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\GenerateCoolWordWithColorRepository;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordRepository;


$randomCoolWordWithColor = new RandomCoolWordWithColor(new GenerateCoolWordWithColorRepository());
$randomColorSearcher = new RandomColorSearcher(new InMemoryColorRepository());
$randomCoolWordSearcher = new RandomCoolWordSearcher(new InMemoryCoolWordRepository());
$colorWordFormatArray = $randomCoolWordWithColor->__invoke($randomColorSearcher, $randomCoolWordSearcher);

$c = new Color();
$coolWord = $colorWordFormatArray['coolWord'];
$bgColor = $colorWordFormatArray['bgColor'];
$textColor = $colorWordFormatArray['textColor'];

echo $c($coolWord)->bg($bgColor)->$textColor . PHP_EOL;
