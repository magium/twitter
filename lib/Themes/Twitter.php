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

    public $tweetBoxXpath = '//div[@id="timeline"]/descendant::div[contains(concat(" ",normalize-space(@class)," "), " tweet-content ")]/descendant::div[contains(concat(" ",normalize-space(@class)," "), " RichEditor ")]';
    public $tweetButton = '//button[contains(concat(" ",normalize-space(@class)," "), " js-tweet-btn ") and not(contains(concat(" ",normalize-space(@class)," "), " disabled "))]';

    public $siteUsernameXpath = '//input[@name="session[username_or_email]"]';
    public $sitePasswordXpath = '//input[@name="session[password]"]';
    public $siteSignInXpath = '//input[@type="submit"]';

    public $twitterUrl = 'https://twitter.com/';

    public $loginButtonXpath = '//a[contains(concat(" ",normalize-space(@class)," "), " js-login ")]';

    /**
     * @return string
     */
    public function getTweetButton()
    {
        return $this->tweetButton;
    }

    /**
     * @return string
     */
    public function getLoginButtonXpath()
    {
        return $this->loginButtonXpath;
    }



    /**
     * @return string
     */
    public function getTwitterUrl()
    {
        return $this->twitterUrl;
    }


    /**
     * @return string
     */
    public function getSiteUsernameXpath()
    {
        return $this->siteUsernameXpath;
    }

    /**
     * @return string
     */
    public function getSitePasswordXpath()
    {
        return $this->sitePasswordXpath;
    }

    /**
     * @return string
     */
    public function getSiteSignInXpath()
    {
        return $this->siteSignInXpath;
    }


    public function getTweetBoxXpath()
    {
        return $this->tweetBoxXpath;
    }

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