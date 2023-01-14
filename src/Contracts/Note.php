<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphTo;

interface Note
{
    /**
     * Get the current connection name for the model. Can't wait for Laravel 9
     * and return type declarations on built-in methods.
     *
     * @return string|null
     */
    public function getConnectionName();

    /**
     * Get the table associated with the model. Can't wait for Laravel 9
     * and return type declarations on built-in methods.
     *
     * @return string
     */
    public function getTable();

    /**
     * User responsible for the note.
     */
    public function user(): MorphTo;

    /**
     * Get the notable model responsible for this note.
     */
    public function notable(): MorphTo;
}
