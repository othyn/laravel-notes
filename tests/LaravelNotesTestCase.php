<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Tests;

use Othyn\LaravelNotes\LaravelNotesServiceProvider;

class LaravelNotesTestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * {@inheritDoc}
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelNotesServiceProvider::class,
        ];
    }
}
