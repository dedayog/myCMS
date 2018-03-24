<?php
/**
 * Created by PhpStorm.
 * User: Dan
 * Date: 24.03.2018
 * Time: 12:50
 */

namespace Engine;

class Cms
{
    /**
     * @var $DI
     */
    private $di;

    public $router;

    /**
     * Cms constructor.
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

        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('product', '/product/{id}', 'ProductController:index');

        print_r($this->di);

    }
}