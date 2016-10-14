<?php

namespace Magium\Twitter\Actions;

use Magium\Twitter\Themes\Twitter;
use Magium\WebDriver\ExpectedCondition;
use Magium\WebDriver\WebDriver;

class Tweet
{

    const ACTION = 'Magium\Twitter\Actions\Tweet';

    protected $theme;
    protected $webDriver;

    public function __construct(
        Twitter $theme,
        WebDriver $webDriver
    )
    {
        $this->theme = $theme;
        $this->webDriver = $webDriver;
    }

    public function tweet($text)
    {

        $element = $this->webDriver->byXpath($this->theme->getTweetBoxXpath());
        $element->click();

        $this->webDriver->getKeyboard()->sendKeys($text);

        $element = $this->webDriver->byXpath($this->theme->getTweetButton());
        $element->click();

    }

}