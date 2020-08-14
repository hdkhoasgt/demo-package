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
    private $helloMessage = null;

    /**
     * @var string
     */
    private $byeMessage = null;

    /**
     * DemoPackage constructor.
     */
    public function __construct()
    {
        $this->helloMessage = config('demo-package.messages.hello');
        $this->byeMessage = config('demo-package.messages.bye');
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
