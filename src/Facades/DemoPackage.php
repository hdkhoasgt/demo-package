<?php

namespace Hdkhoasgt\DemoPackage\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string hello(mixed $name, mixed $template = null)
 * @method static string bye(mixed $name, mixed $template = null)
 *
 * @see \Hdkhoasgt\DemoPackage\DemoPackage
 */
class DemoPackage extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'demo-package';
    }
}
