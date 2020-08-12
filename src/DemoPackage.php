<?php

namespace Hdkhoasgt\DemoPackage;

/**
 * Class DemoPackage
 * @package Hdkhoasgt\DemoPackage
 */
class DemoPackage
{
    /**
     * @var string
     */
    private $helloMessage = 'Hello, {name}.';

    /**
     * @var string
     */
    private $byeMessage = 'Bye, {name}.';

    /**
     * DemoPackage constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $name
     * @param $template
     * @return string
     */
    public function hello($name, $template = null)
    {
        $template = $template ?? $this->helloMessage;
        return preg_replace('/\{name\}/', $name, $template);
    }

    /**
     * @param $name
     * @param $template
     * @return string
     */
    public function bye($name, $template = null)
    {
        $template = $template ?? $this->byeMessage;
        return preg_replace('/\{name\}/', $name, $template);
    }
}
