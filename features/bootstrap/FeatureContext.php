<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
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
    private $client;
    private $response;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost:3000',
            'timeout'  => 2.0,
        ]);
    }

    /**
     * @When I send a :arg1 request to :arg2
     */
    public function iSendARequestTo($method, $uri): Response
    {
        $this->response = $this->client->request($method, $uri);
        return $this->response;
    }

    /**
     * @Then the response status code should be :arg1
     */
    public function theResponseStatusCodeShouldBe($code): bool
    {
        if($this->response->getStatusCode()==$code){
            return true;
        }
        throw new Exception('status error is not 200');
    }

    /**
     * @Then the response content should be a color random
     */
    public function theResponseContentShouldBeAColorRandom(): bool
    {
        $colorCurrent = $this->response->getBody();
        if($this->theResponseValidateColorRandom($colorCurrent)){
            return true;
        }
        throw new Exception('Error in generate random color');
    }

    public function theResponseValidateColorRandom(string $color): bool
    {
        return in_array($color, $this->getArrayColors());
    }
    /**
     * @Then the response content should be cool word
     */
    public function theResponseContentShouldBeCoolWord(): bool
    {
        $coolWordCurrent = $this->response->getBody();
        if($this->theResponseValidateCoolWordRandom($coolWordCurrent)){
            return true;
        }
        throw new Exception('Error in generate random cool word');
    }
    public function theResponseValidateCoolWordRandom(string $coolWord): bool
    {
        return in_array($coolWord, $this->getArrayCoolWords());
    }

    private function getArrayCoolWords(): array
    {
        return [
            'Chachi pistachi!',
            'Esto mola mogollón, tío!',
            'Mola mazo!',
            'Eres mazo guay',
            'Holiiiiii',
            'Besiis',
        ];
    }

    private function getArrayColors(): array
    {
        return  ['red', 'cyan', 'magenta', 'green', 'black', 'yellow', 'blue', 'light_gray'];
    }

    /**
     * @Then the response should be in JSON
     */
    public function theResponseShouldBeInJson(): bool
    {
        $coolWordJsonFormat = $this->response->getBody();
        echo $coolWordJsonFormat;
        if(empty(json_decode($coolWordJsonFormat))){
            throw new Exception('The Response is not a format JSON');
        }
        return true;
    }

    /**
     * @Then the response content should be color valid
     */
    public function theResponseContentShouldBeColorValid(): bool
    {
        $coolWordJsonFormat = $this->response->getBody();
        echo $coolWordJsonFormat;
        $arrayCoolWordFormat = json_decode($coolWordJsonFormat);
        if(!$this->theResponseValidateColorRandom($arrayCoolWordFormat->textColor)){
            throw new Exception('The textColor is not a color valid!!');
        }
        return true;
    }

    /**
     * @Then the response content should be cool word valid
     */
    public function theResponseContentShouldBeCoolWordValid(): bool
    {
        $coolWordJsonFormat = $this->response->getBody();
        echo $coolWordJsonFormat;
        $arrayCoolWordFormat = json_decode($coolWordJsonFormat);
        if(!$this->theResponseValidateCoolWordRandom($arrayCoolWordFormat->coolWord)){
            throw new Exception('The cool word is not a color valid!!');
        }
        return true;
    }

    /**
     * @Then the response content should be json format whith :arg1, :arg2 and :arg3
     */
    public function theResponseContentShouldBeJsonFormatWhithAnd(string $keyTextColor,
                                                                 string $keyCoolword,
                                                                 string $keyBgcolor)
    {
        $coolWordJsonFormat = $this->response->getBody();
        $coolWordArrayFormat = json_decode($coolWordJsonFormat, true);
        if(!isset($coolWordArrayFormat[$keyTextColor])){
            throw new Exception('Not Exist key: textColor in Response');
        }
        if(!isset($coolWordArrayFormat[$keyCoolword])){
            throw new Exception('Not Exist key: coolWord in Response');
        }
        if(!isset($coolWordArrayFormat[$keyBgcolor])){
            throw new Exception('Not Exist key: bgColor in Response');
        }
    }


}
