<?php

namespace Magium\Twitter\Identities;

use Magium\AbstractConfigurableElement;

class Twitter extends AbstractConfigurableElement
{
    const IDENTITY = 'Magium\Twitter\Identities\Twitter';

    public $username = 'nobody';
    public $password = 'nopassword';

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    

}