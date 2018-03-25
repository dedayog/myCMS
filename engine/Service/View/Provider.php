<?php

namespace Engine\Service\View;

use Engine\Core\Template\View;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'view';

    /**
     *
     */
    function init()
    {
        $view = new View(); //'http://mycms.loc/'

        $this->di->set($this->serviceName, $view);
    }
}