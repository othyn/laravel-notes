<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Othyn\LaravelNotes\Models\Note.
 *
 * @property int                             $id
 * @property int                             $user_id
 * @property int                             $user_type
 * @property int                             $notable_id
 * @property int                             $notable_type
 * @property string                          $contents
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @mixin \Eloquent
 */
class Note extends Model implements \Othyn\LaravelNotes\Contracts\Note
{
    use SoftDeletes;
    use \Othyn\LaravelNotes\Traits\Note;

    /**
     * {@inheritdoc}
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
