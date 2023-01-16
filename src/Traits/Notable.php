<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Othyn\LaravelNotes\Contracts\Note;
use Othyn\LaravelNotes\Resolvers\UserResolver;

trait Notable
{
    /**
     * {@inheritDoc}
     */
    public function notes(): MorphMany
    {
        return $this->morphMany(
            related: config(
                key: 'laravel-notes.note',
                default: \Othyn\LaravelNotes\Models\Note::class
            ),
            name: 'notable'
        );
    }

    /**
     * {@inheritDoc}
     */
    public function latestNote(): ?Note
    {
        return $this->morphOne(
            related: config(
                key: 'laravel-notes.note',
                default: \Othyn\LaravelNotes\Models\Note::class
            ),
            name: 'notable'
        )
            ->latestOfMany()
            ->first();
    }

    /**
     * {@inheritDoc}
     */
    public function oldestNote(): ?Note
    {
        return $this->morphOne(
            related: config(
                key: 'laravel-notes.note',
                default: \Othyn\LaravelNotes\Models\Note::class
            ),
            name: 'notable'
        )
            ->oldestOfMany()
            ->first();
    }

    /**
     * {@inheritDoc}
     */
    public function note(string $contents): Note
    {
        $user = UserResolver::resolve();

        return $this
            ->notes()
            ->create(attributes: [
                UserResolver::notesIdField() => is_null($user) ? null : $user->getAuthIdentifier(),
                UserResolver::notesTypeField() => is_null($user) ? null : get_class($user),
                'contents' => $contents,
            ]);
    }
}
