<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Notable
{
    /**
     * Notes for this notable entity.
     */
    public function notes(): MorphMany;

    /**
     * Create a new note for this notable entity.
     */
    public function note(string $text): Note;
}
