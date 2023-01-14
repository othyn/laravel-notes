<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Note
    |--------------------------------------------------------------------------
    |
    | Define which entity should represent a Note.
    |
    | Default: Othyn\LaravelNotes\Models\Note::class
    |
    */

    'note' => Othyn\LaravelNotes\Models\Note::class,

    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    |
    | Define how the authentication system refers to a User entity.
    |
    */

    'auth' => [
        'guards' => [
            'web',
            'api',
        ],
        'user' => [
            'field_prefix' => 'user',
            'resolver' => \Othyn\LaravelNotes\Resolvers\UserResolver::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Database
    |--------------------------------------------------------------------------
    |
    | The database configuration that notes should use. Passing null will make
    | it default to the app default database connection via `database.default`.
    |
    */

    'database' => [
        'connection' => env(
            key: 'LARAVEL_NOTES_CONNECTION',
            default: config(
                key: 'database.default'
            )
        ),
        'table' => env(
            key: 'LARAVEL_NOTES_TABLE',
            default: 'notes'
        ),
    ],
];
