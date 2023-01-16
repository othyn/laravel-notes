<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Resolvers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class UserResolver implements \Othyn\LaravelNotes\Contracts\UserResolver
{
    use \Othyn\LaravelNotes\Traits\UserResolver;

    /**
     * {@inheritDoc}
     */
    public static function resolve(): Authenticatable|null
    {
        $resolver = static::resolver();

        if ($resolver !== static::class
            && is_subclass_of(object_or_class: $resolver, class: \Othyn\LaravelNotes\Contracts\UserResolver::class)) {
            return call_user_func(callback: [
                $resolver,
                'resolve',
            ]);
        }

        $guards = config(
            key: 'laravel-notes.auth.guards',
            default: config(
                key: 'auth.defaults.guard'
            )
        );

        foreach ($guards as $guard) {
            try {
                if (Auth::guard(name: $guard)->check()) {
                    return Auth::guard(name: $guard)->user();
                }
            } catch (\Exception $exception) {
                continue;
            }
        }

        return null;
    }
}
