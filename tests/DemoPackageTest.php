<?php

namespace Hdkhoasgt\DemoPackage\Tests;

use Hdkhoasgt\DemoPackage\Facades\DemoPackage;
use Orchestra\Testbench\TestCase;
use Hdkhoasgt\DemoPackage\DemoPackageServiceProvider;

class DemoPackageTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            DemoPackageServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
    }

    /**
     * @test
     */
    public function helloMessage()
    {
        // Empty name
        $this->assertEquals('Hello, .', DemoPackage::hello(''));
        $this->assertEquals('Hello, .', DemoPackage::hello(null));

        // No custom template
        $this->assertEquals('Hello, Khoa.', DemoPackage::hello('Khoa'));
        $this->assertEquals('Hello, Khoa Hoang.', DemoPackage::hello('Khoa Hoang'));

        // Has custom template
        $this->assertEquals('Dear Khoa,', DemoPackage::hello('Khoa', 'Dear {name},'));
    }

    /**
     * @test
     */
    public function byeMessage()
    {
        // Empty name
        $this->assertEquals('Bye, .', DemoPackage::bye(''));
        $this->assertEquals('Bye, .', DemoPackage::bye(null));

        // No custom template
        $this->assertEquals('Bye, Khoa.', DemoPackage::bye('Khoa'));
        $this->assertEquals('Bye, Khoa Hoang.', DemoPackage::bye('Khoa Hoang'));

        // Has custom template
        $this->assertEquals('Goodbye Khoa!', DemoPackage::bye('Khoa', 'Goodbye {name}!'));
    }

    /**
     * @test
     */
    public function serviceProvider()
    {
        $this->assertEquals('Hello, Khoa.', app()->make('demo-package')->hello('Khoa'));
        $this->assertEquals('Bye, Khoa.', app()->make('demo-package')->bye('Khoa'));
    }

    /**
     * @test
     */
    public function rejectEmptyFields()
    {
        $collect = collect(['', null, 1, 'xyz']);
        $this->assertEquals(4, $collect->count());
        $this->assertEquals('', $collect->values()->get(0));
        $this->assertEquals(null, $collect->values()->get(1));
        $this->assertEquals(1, $collect->values()->get(2));
        $this->assertEquals('xyz', $collect->values()->get(3));

        $collect = $collect->rejectEmptyFields();
        $this->assertEquals(2, $collect->count());
        $this->assertEquals(1, $collect->values()->get(0));
        $this->assertEquals('xyz', $collect->values()->get(1));
    }
}
