<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Tests;

use Illuminate\Config\Repository;
use Othyn\LaravelNotes\LaravelNotesServiceProvider;
use Othyn\LaravelNotes\Resolvers\UserResolver;

class LaravelNotesTestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getEnvironmentSetUp($app)
    {
        /** @var Repository $repo */
        $repo = $app['config'];

        $repo->set(key: 'database.default', value: 'testing');

        $repo->set(key: 'database.connections.testing', value: [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $repo->set(key: 'laravel-notes.database.connection', value: 'testing');

        $repo->set(key: 'laravel-notes.database.table', value: 'notes');

        $repo->set(key: 'laravel-notes.auth.guards', value: [
            'web',
            'api',
        ]);

        $repo->set(key: 'laravel-notes.auth.user.field_prefix', value: 'user');

        $repo->set(key: 'laravel-notes.auth.user.resolver', value: UserResolver::class);

        $app['config'] = $repo;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Load package migrations - yes they have to be separate calls, 'paths' param isn't what you think
        $this->loadMigrationsFrom(paths: __DIR__ . '/../database/migrations');

        // Load test migrations - yes they have to be separate calls, 'paths' param isn't what you think
        $this->loadMigrationsFrom(paths: __DIR__ . '/database/migrations');
    }

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
