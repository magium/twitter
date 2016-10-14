[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/magium/twitter/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/magium/twitter/?branch=master)

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

[Note that you should be familiar with AbstractConfigurableElements to do this](https://www.youtube.com/watch?v=JdeGTb_ZV_I)

##Sign In With Twitter

Using the sign-in-with-Twitter functionality

```

    public function testSignInWithTwitter()
    {
        
        $action = $this->getAction(SignInWithTwitter::ACTION);
        /* @var $action SignInWithTwitter */
        $action->execute();

    }

```

##Log In To Twitter

To log in via the Twitter front page...

```

    public function testAuthenticate()
    {
        $this->getAction(AuthenticateTwitter::ACTION)->execute();
    }

```

##To tweet

```

    public function testTweet()
    {
        $text = 'This is text I would like to tweet';

        $this->getAction(AuthenticateTwitter::ACTION)->execute();
        $this->getAction(Tweet::ACTION)->tweet($text);
    }
```

