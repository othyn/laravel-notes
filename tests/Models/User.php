<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Othyn\LaravelNotes\Tests\Database\Factories\UserFactory;

/**
 * Othyn\LaravelNotes\Tests\Models\User.
 *
 * @property int                             $id
 * @property string                          $name
 * @property string                          $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string                          $password
 * @property string                          $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @mixin \Eloquent
 */
class User extends Authenticatable implements \Othyn\LaravelNotes\Contracts\Notable
{
    use HasFactory;
    use \Othyn\LaravelNotes\Traits\Notable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * HasFactory will resolve into the default Laravel \Database\Factories namespace, only way to override this
     * behaviour is just to manually return the model instance to use, HasFactory will use this value as an override.
     */
    protected static function newFactory(): UserFactory
    {
        return new UserFactory();
    }
}
