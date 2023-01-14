<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Tests\Feature;

use Othyn\LaravelNotes\Tests\Models\TestModel;

it('can create a new note', function () {
    $test = new TestModel();

    $test->newNote(
        note: 'Hey there!'
    );
});
