<?php

declare(strict_types=1);

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Othyn\LaravelNotes\Tests\LaravelNotesTestCase;
use Othyn\LaravelNotes\Tests\Models\User;
use PHPUnit\Framework\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

// uses(Tests\TestCase::class)->in('Feature');
uses(LaravelNotesTestCase::class)
    ->in(__DIR__);

uses(RefreshDatabase::class);
//    ->beforeEach(fn () => User::factory()->create());

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toPublish', function () {
    test()
        ->artisan(
            command: 'vendor:publish',
            parameters: [
                '--provider' => 'Othyn\\LaravelNotes\\LaravelNotesServiceProvider',
                '--tag' => $this->value,
            ]
        )
        ->assertSuccessful();

    return test();
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

/**
 * Set the currently logged-in user for the application.
 */
function actingAs(Authenticatable $user, string $driver = null): TestCase
{
    return test()->actingAs($user, $driver);
}

/**
 * Deletes a given file or directory at the given path if it exists.
 */
function resetPath(string $path): void
{
    if (File::exists(path: $path)) {
        File::delete(paths: $path);
    }

    if (File::isDirectory(directory: $path)) {
        File::deleteDirectory(directory: $path);
    }
}
