<?php

namespace Magium\Twitter\Themes;

use Magium\AbstractConfigurableElement;
use Magium\AbstractTestCase;
use Magium\Themes\BaseThemeInterface;

class Twitter extends AbstractConfigurableElement implements BaseThemeInterface
{

    public $homeXpath = '//a[@data-nav="home"]';
    public $guaranteedPageLoadedElementDisplayedXpath = '//div[@class="footer"]';
    public $usernameXpath = '//input[@id="username_or_email"]';
    public $passwordXpath = '//input[@id="password"]';
    public $signInXpath = '//input[@id="allow"]';
    public $rememberXpath = '//input[@id="remember"]';

    /**
     * @return string
     */
    public function getPasswordXpath()
    {
        return $this->passwordXpath;
    }

    /**
     * @return string
     */
    public function getRememberXpath()
    {
        return $this->rememberXpath;
    }

    /**
     * @return string
     */
    public function getSignInXpath()
    {
        return $this->signInXpath;
    }

    /**
     * @return string
     */
    public function getUsernameXpath()
    {
        return $this->usernameXpath;
    }

    public function getHomeXpath()
    {
        return $this->homeXpath;
    }

    public function configure(AbstractTestCase $testCase)
    {
        // Nothing to do
    }

    public function getGuaranteedPageLoadedElementDisplayedXpath()
    {
        return $this->guaranteedPageLoadedElementDisplayedXpath;
    }

    public function setGuaranteedPageLoadedElementDisplayedXpath($xpath)
    {
        $this->guaranteedPageLoadedElementDisplayedXpath = $xpath;
    }

}