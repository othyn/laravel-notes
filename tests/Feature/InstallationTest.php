<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Tests\Feature;

it('can publish the package config', function () {
    $configFile = config_path(
        path: 'laravel-notes.php'
    );

    resetPath(path: $configFile);

    expect($configFile)
        ->not
        ->toBeFile()
        ->and('config')
        ->toPublish()
        ->and($configFile)
        ->toBeFile();
});

it('can publish the package migrations', function () {
    $migrationsDirectory = database_path(
        path: 'migrations'
    );

    resetPath(path: $migrationsDirectory);

    expect($migrationsDirectory)
        ->not
        ->toBeDirectory()
        ->and('migrations')
        ->toPublish()
        ->and($migrationsDirectory)
        ->toBeDirectory()
        ->and("{$migrationsDirectory}/2023_01_09_191830_create_notes_table.php")
        ->toBeFile();
});
