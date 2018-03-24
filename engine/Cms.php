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

    public $db;

    /**
     * Cms constructor.
     * @param $di
     */
    public function __construct($di) {
        $this->di = $di;
    }

    /**
     * Run CMS
     */
    public function run()
    {
        print_r($this->di);

    }
}