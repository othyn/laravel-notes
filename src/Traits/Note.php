<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Traits;

use Illuminate\Database\Eloquent\Relations\MorphTo;

trait Note
{
    /**
     * {@inheritdoc}
     */
    public function getConnectionName()
    {
        return config(
            key: 'laravel-notes.database.connection'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getTable(): string
    {
        return config(
            key: 'laravel-notes.database.table',
            default: parent::getTable()
        );
    }

    /**
     * {@inheritDoc}
     */
    public function user(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * {@inheritDoc}
     */
    public function notable(): MorphTo
    {
        return $this->morphTo();
    }
}
