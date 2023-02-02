<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Contracts;

use Illuminate\Support\Collection;

/**
 * @property Collection<int, Note> $notes
 */
interface Notable
{
    /**
     * Notes relationship declaration for this notable entity.
     */
    public function notes(): mixed;

    /**
     * Latest note for this notable entity.
     */
    public function latestNote(): ?Note;

    /**
     * Oldest note for this notable entity.
     */
    public function oldestNote(): ?Note;

    /**
     * Create a new note for this notable entity.
     */
    public function note(string $text): Note;
}
