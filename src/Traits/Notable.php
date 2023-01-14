<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
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
    public function note(string $text): \Othyn\LaravelNotes\Contracts\Note
    {
        $user = UserResolver::resolve();

        return $this
            ->notes()
            ->create(attributes: [
                UserResolver::notesTypeField() => get_class($user),
                UserResolver::notesIdField() => $user->getAuthIdentifier(),
                'note' => $text,
            ]);
    }
}
