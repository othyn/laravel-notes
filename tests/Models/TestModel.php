<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Tests\Models;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model implements \Othyn\LaravelNotes\Contracts\Notable
{
    use \Othyn\LaravelNotes\Traits\Notable;

    /**
     * {@inheritdoc}
     */
    protected $guarded = [];
}
