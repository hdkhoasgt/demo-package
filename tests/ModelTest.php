<?php

namespace Hdkhoasgt\DemoPackage\Tests;

use Hdkhoasgt\DemoPackage\Facades\DemoPackage;
use Hdkhoasgt\DemoPackage\Models\MessageLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase;
use Hdkhoasgt\DemoPackage\DemoPackageServiceProvider;

class ModelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__ . '/factories');
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

        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'mysql',
            'host' => 'database',
            'port' => '3306',
            'database' => 'docker',
            'username' => 'docker',
            'password' => 'docker',
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ]);

        // import the CreateMessageLogsTable class from the migration
        include_once __DIR__ . '/../database/migrations/create_message_logs_table.php.stub';

        // run the up() method of that migration class
        (new \CreateMessageLogsTable)->up();
    }

    /**
     * @test
     */
    public function factories()
    {
        $messageLog = factory(MessageLog::class)->create(['message' => 'Fake message']);
        $this->assertEquals('Fake message', $messageLog->message);
    }
}
