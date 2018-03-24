<?php

namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'router';

    /**
     *
     */
    function init()
    {
        $router = new Router('http://mycms.loc/');

        $this->di->set($this->serviceName, $router);
    }
}