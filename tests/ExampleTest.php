<?php

namespace Oliverbj\DatabaseUpdater\Tests;

use Orchestra\Testbench\TestCase;
use Oliverbj\DatabaseUpdater\DatabaseUpdaterServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [DatabaseUpdaterServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
