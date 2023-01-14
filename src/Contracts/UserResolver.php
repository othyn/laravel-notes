<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;

interface UserResolver
{
    /**
     * Get the class name of the resolver instance to be used.
     */
    public static function resolver(): string;

    /**
     * Resolve the User.
     */
    public static function resolve(): Authenticatable|null;

    /**
     * Gets the current field prefix for the user field in the notes table.
     */
    public static function notesFieldPrefix(): string;

    /**
     * Gets the qualified name of the user type field in the notes table.
     */
    public static function notesTypeField(): string;

    /**
     * Gets the qualified name of the user id field in the notes table.
     */
    public static function notesIdField(): string;
}
