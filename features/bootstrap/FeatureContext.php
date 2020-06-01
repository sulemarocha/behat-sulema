<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use LaSalle\ChupiProject\Module\Color\Application\RandomColorSearcher;
use LaSalle\ChupiProject\Module\Color\Infrastructure\InMemoryColorRepository;
use PHPUnit\Framework\Assert;
/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    private $colors;
    private $randomColorSearcher;
    private $colorGenerated;
    public function __construct()
    {
        $this->randomColorSearcher = new RandomColorSearcher(new InMemoryColorRepository());
    }

    /**
     * @Given I have an array of colors
     */
    public function iHaveAnArrayOfColors()
    {
        $this->colors =  ['red', 'cyan', 'magenta', 'green', 'black', 'yellow', 'blue', 'light_gray'];
    }

    /**
     * @When I generate a color from use case
     */
    public function iGenerateAColorFromUseCase()
    {
        $this->colorGenerated = $this->randomColorSearcher->__invoke();
    }

    /**
     * @Then The result should be a color
     */
    public function theResultShouldBeAColor()
    {
        Assert::assertContains($this->colorGenerated, $this->colors, 'not is a color');
    }

}
