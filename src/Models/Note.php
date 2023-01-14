<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model implements \Othyn\LaravelNotes\Contracts\Note
{
    use \Othyn\LaravelNotes\Traits\Note;

    /**
     * {@inheritdoc}
     */
    protected $guarded = [];
}
