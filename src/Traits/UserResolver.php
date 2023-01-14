<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Traits;

trait UserResolver
{
    /**
     * {@inheritDoc}
     */
    public static function resolver(): string
    {
        return config(
            key: 'laravel-notes.auth.user.resolver'
        );
    }

    /**
     * {@inheritDoc}
     */
    public static function notesFieldPrefix(): string
    {
        return config(
            key: 'laravel-notes.auth.user.field_prefix'
        );
    }

    /**
     * {@inheritDoc}
     */
    public static function notesTypeField(): string
    {
        return static::notesFieldPrefix() . '_type';
    }

    /**
     * {@inheritDoc}
     */
    public static function notesIdField(): string
    {
        return static::notesFieldPrefix() . '_id';
    }
}
