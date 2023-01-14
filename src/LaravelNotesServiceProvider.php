<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes;

use Illuminate\Support\ServiceProvider;

class LaravelNotesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->registerPublishables();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }

    /**
     * Register application publishables.
     */
    protected function registerPublishables(): void
    {
        $this->mergeConfigFrom(
            path: __DIR__ . '/../config/config.php',
            key: 'laravel-notes'
        );

        $this->loadMigrationsFrom(
            paths: __DIR__ . '/../database/migrations'
        );

        if ($this->app->runningInConsole()) {
            $this->publishes(
                paths: [
                    __DIR__ . '/../config/config.php' => config_path(path: 'laravel-notes.php'),
                ],
                groups: 'config'
            );

            $this->publishes(
                paths: [
                    __DIR__ . '/../database/migrations/2023_01_09_191830_create_notes_table.php' => database_path(path: 'migrations/2023_01_09_191830_create_notes_table.php'),
                ],
                groups: 'migrations'
            );
        }
    }
}
