<?php

namespace Magium\Twitter\Actions;

use Facebook\WebDriver\Exception\NoSuchElementException;
use Magium\Twitter\Themes\Twitter;
use Magium\Twitter\Identities\Twitter as TwitterIdentity;
use Magium\WebDriver\WebDriver;

class SignInWithTwitter
{
    const ACTION = 'Magium\Twitter\Actions\SignInWithTwitter';
    
    protected $webDriver;
    protected $theme;
    protected $identity;
    
    public function __construct(
        WebDriver $webDriver,
        Twitter $theme,
        TwitterIdentity $identity
    )
    {
        $this->webDriver    = $webDriver;
        $this->theme        = $theme;
        $this->identity     = $identity;
    }
    
    public function execute($remember = false)
    {
        try {
            $element = $this->webDriver->byXpath($this->theme->getUsernameXpath());
            $element->clear();
            $element->sendKeys($this->identity->getUsername());

            $element = $this->webDriver->byXpath($this->theme->getPasswordXpath());
            $element->clear();
            $element->sendKeys($this->identity->getPassword());

            if ($remember) {
                $element = $this->webDriver->byXpath($this->theme->getRememberXpath());
                $element->click();
            }

        } catch (NoSuchElementException $e) {
            // Presuming that we're logged in
        }
        $element = $this->webDriver->byXpath($this->theme->getSignInXpath());
        $element->click();
    }

}