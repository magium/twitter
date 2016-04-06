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
use Zend\Di\Config;
use Zend\Di\Di;

class NoAbstractTestClassTest extends \PHPUnit_Framework_TestCase
{

    public function testWithoutMagium()
    {
        // This test is based off of my own test environment and so everything up until the Twitter authentication will
        // not work.  So ignore the first part.

        $webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', DesiredCapabilities::chrome());

        $webDriver->get('http://magiumlib.loc/');
        $webDriver->findElement(WebDriverBy::linkText('Log In'))->click();
        $element = $webDriver->findElement(WebDriverBy::xpath('//div[@data-strategy="twitter"]'));
        $webDriver->wait()->until(ExpectedCondition::visibilityOf($element));
        $element->click();

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
            new Twitter($configurationProvider, $collector)
        );
        $action->execute();
        $webDriver->quit();
    }


}