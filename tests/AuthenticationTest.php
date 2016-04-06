<?php

namespace Tests\Magium\Twitter;

use Magium\AbstractTestCase;
use Magium\Twitter\Actions\AuthenticateTwitter;
use Magium\Twitter\Identities\Twitter;
use Magium\WebDriver\ExpectedCondition;
use Magium\WebDriver\WebDriver;

class AuthenticationTest extends AbstractTestCase
{

    public function testAuthentication()
    {
        // This test is based off of my own test environment and so everything up until the Twitter authentication will
        // not work.  So ignore the first part.

        $this->commandOpen('http://magiumlib.loc/');
        $this->byText('Log In')->click();
        $this->webdriver->wait()->until(ExpectedCondition::elementExists('//div[@data-strategy="twitter"]', WebDriver::BY_XPATH));
        $element = $this->byXpath('//div[@data-strategy="twitter"]');
        $this->webdriver->wait()->until(ExpectedCondition::visibilityOf($element));
        $this->byXpath('//div[@data-strategy="twitter"]')->click();
        
        // This part should work for you
        $action = $this->getAction(AuthenticateTwitter::ACTION);
        /* @var $action AuthenticateTwitter */
        $action->execute();
    }

    public function testAuthenticationWorksEvenIfCurrentUserIsLoggedIn()
    {
        // This test is based off of my own test environment and so everything up until the Twitter authentication will
        // not work.  So ignore the first part.

        // Also note that this test only works for users that have NOT signed in with your app.

        $identity = $this->getIdentity(Twitter::IDENTITY);
        /* @var $identity Twitter */
        
        $this->commandOpen('https://www.twitter.com/');
        $this->byText('Log In')->click();
        $this->byXpath('//input[@name="session[username_or_email]"]')->sendKeys($identity->getUsername());
        $this->byXpath('//input[@name="session[password]"]')->sendKeys($identity->getPassword());
        $this->byXpath('//input[@type="submit" and @value="Log in"]')->click();

        $this->commandOpen('http://magiumlib.loc/');
        $this->byText('Log In')->click();
        $this->webdriver->wait()->until(ExpectedCondition::elementExists('//div[@data-strategy="twitter"]', WebDriver::BY_XPATH));
        $element = $this->byXpath('//div[@data-strategy="twitter"]');
        $this->webdriver->wait()->until(ExpectedCondition::visibilityOf($element));
        $this->byXpath('//div[@data-strategy="twitter"]')->click();

        // This part should work for you
        $action = $this->getAction(AuthenticateTwitter::ACTION);
        /* @var $action AuthenticateTwitter */
        $action->execute();


    }

}