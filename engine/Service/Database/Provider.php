<?php

namespace Engine\Service\Database;

use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'db';

    /**
     *
     */
    function init()
    {
        $db = new Connection();

        $this->di->set($this->serviceName, $db);
    }
}