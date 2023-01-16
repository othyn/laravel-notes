<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Othyn\LaravelNotes\Tests\Database\Factories\FridgeFactory;

/**
 * Othyn\LaravelNotes\Tests\Models\Fridge.
 *
 * @property int                             $id
 * @property string                          $room
 * @property string                          $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @mixin \Eloquent
 */
class Fridge extends Model implements \Othyn\LaravelNotes\Contracts\Notable
{
    use HasFactory;
    use \Othyn\LaravelNotes\Traits\Notable;

    /**
     * {@inheritdoc}
     */
    protected $guarded = [];

    /**
     * HasFactory will resolve into the default Laravel \Database\Factories namespace, only way to override this
     * behaviour is just to manually return the model instance to use, HasFactory will use this value as an override.
     */
    protected static function newFactory(): FridgeFactory
    {
        return new FridgeFactory();
    }
}
