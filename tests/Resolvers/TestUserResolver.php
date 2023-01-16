<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Tests\Resolvers;

use Illuminate\Contracts\Auth\Authenticatable;

class TestUserResolver implements \Othyn\LaravelNotes\Contracts\UserResolver
{
    use \Othyn\LaravelNotes\Traits\UserResolver;

    /**
     * {@inheritDoc}
     */
    public static function resolve(): Authenticatable|null
    {
        return null;
    }
}
