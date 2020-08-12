<?php

namespace Hdkhoasgt\DemoPackage;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Hdkhoasgt\DemoPackage\DemoPackage
 */
class DemoPackageFacade extends Facade
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
