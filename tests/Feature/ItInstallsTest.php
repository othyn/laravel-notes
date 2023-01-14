<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Tests\Feature;

use Illuminate\Support\Facades\File;
use Othyn\LaravelNotes\Tests\LaravelNotesTestCase;

it('can publish the package config', function () {
    $configFile = config_path(
        path: 'laravel-notes.php'
    );

    if (File::exists(path: $configFile)) {
        File::delete(
            paths: $configFile
        );
    }

    /* @var LaravelNotesTestCase $this */
    $this->assertFileDoesNotExist(
        filename: $configFile
    );

    $this->artisan(
        command: 'vendor:publish',
        parameters: [
            '--provider' => 'Othyn\\LaravelNotes\\LaravelNotesServiceProvider',
            '--tag' => 'config',
        ])
        ->assertSuccessful();

    $this->assertFileExists(
        filename: $configFile
    );
});

it('can publish the package migrations', function () {
    $migrationsDirectory = database_path(
        path: 'migrations'
    );

    if (File::isDirectory(directory: $migrationsDirectory)) {
        File::deleteDirectory(
            directory: $migrationsDirectory
        );
    }

    /* @var LaravelNotesTestCase $this */
    $this->assertDirectoryDoesNotExist(
        directory: $migrationsDirectory
    );

    $this->artisan(
        command: 'vendor:publish',
        parameters: [
            '--provider' => 'Othyn\\LaravelNotes\\LaravelNotesServiceProvider',
            '--tag' => 'migrations',
        ])
        ->assertSuccessful();

    $this->assertDirectoryExists(
        directory: $migrationsDirectory
    );

    $this->assertFileExists(
        filename: "{$migrationsDirectory}/2023_01_09_191830_create_notes_table.php"
    );
});
