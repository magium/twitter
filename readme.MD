# magium/twitter

This is a simple library to help browser tests perform OAuth logins to Twitter.

To install

```
composer require magium/twitter
```

To use:

```
use Magium\Twitter\Actions\AuthenticateTwitter;

class TwitterTest extends \Magium\AbstractTestCase
{

    public function testLogin()
    {
        // Do something that forwards the browser to the twitter OAuth page.

         $action = $this->getAction(AuthenticateTwitter::ACTION);
        /* @var $action AuthenticateTwitter */
        $action->execute();
    }

}
```

## Setting the username and password

There are two ways to set the username and password

### In code

```
use Magium\Twitter\Identities\Twitter
use Magium\Twitter\Actions\AuthenticateTwitter;

class TwitterTest extends \Magium\AbstractTestCase
{

    public function testLogin()
    {

        $identity = $this->getIdentity(Twitter::IDENTITY);
        /* @var $identity Twitter */
        $identity->setUsername('username');
        $identity->setPassword('password');

        // Do something that forwards the browser to the twitter OAuth page.

         $action = $this->getAction(AuthenticateTwitter::ACTION);
        /* @var $action AuthenticateTwitter */
        $action->execute();
    }

}
```

### In configuration

Create the file `/configuration/Magium/Twitter/Identities/Twitter.php` and enter the following:

```
<?php

/* @var $this \Magium\Twitter\Identities\Twitter */
$this->username = 'username';
$this->password = 'password';
```

[https://www.youtube.com/watch?v=JdeGTb_ZV_I](Note that you should be familiar with AbstractConfigurableElements to do this)

## Not in Magium

This library doesn't require Magium to run.  Well, actually it does, but it doesn't need the abstract test class.  It's a little verbose, but this is what it would look like (you could also use a DIC to manage this).

```
<?php

namespace Tests\Magium\Twitter;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Magium\Twitter\Actions\AuthenticateTwitter;
use Magium\Twitter\Identities\Twitter;
use Magium\Util\Configuration\ClassConfigurationReader;
use Magium\Util\Configuration\ConfigurationCollector\DefaultPropertyCollector;
use Magium\Util\Configuration\ConfigurationReader;
use Magium\Util\Configuration\EnvironmentConfigurationReader;
use Magium\Util\Configuration\StandardConfigurationProvider;
use Magium\WebDriver\ExpectedCondition;
use Magium\WebDriver\WebDriver;

class NoAbstractTestClassTest extends \PHPUnit_Framework_TestCase
{

    public function testWithoutMagium()
    {
        // Do some stuff to get to the Twitter authenticaation page

        // Start from here

        $configurationProvider = new StandardConfigurationProvider(
            new ConfigurationReader(),
            new ClassConfigurationReader(),
            new EnvironmentConfigurationReader()
        );
        $collector = new DefaultPropertyCollector();

        $action = new AuthenticateTwitter(
            $webDriver,
            new \Magium\Twitter\Themes\Twitter($configurationProvider, $collector),
            new \Magium\Twitter\Identities\Twitter($configurationProvider, $collector)
        );

        // Everything up to here could have been done using a DIC.

        $action->execute();
        $webDriver->quit();
    }

}
```