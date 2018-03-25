<?php

namespace Engine;

use Engine\Core\Router\DispatchedRoute;
use Engine\Helper\Common;

class Cms
{
    /**
     * @var $DI
     */
    private $di;

    public $router;

    /**
     * cms constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;

        $this->router = $this->di->get('router');
    }

    /**
     * Run CMS
     */
    public function run()
    {
        try {
            $this->router->add('home', '/', 'HomeController:index');
            $this->router->add('product', '/news', 'HomeController:news');

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

            if ($routerDispatch == null) {
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);

            $controller = '\\Cms\\Controller\\' . $class;

            $parameters = $routerDispatch->getParameters();

            call_user_func_array([new $controller($this->di), $action], $parameters);
            //print_r($routerDispatch);
        } catch (\Exception $e) {

            echo $e->getMessage();
            exit;
        }
    }
}