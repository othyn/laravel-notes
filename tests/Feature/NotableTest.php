<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Tests\Feature;

use Illuminate\Support\Collection;
use Othyn\LaravelNotes\Contracts\Note;
use Othyn\LaravelNotes\Tests\LaravelNotesTestCase;
use Othyn\LaravelNotes\Tests\Models\Fridge;
use Othyn\LaravelNotes\Tests\Models\User;
use Othyn\LaravelNotes\Tests\Resolvers\TestUserResolver;

it('can create a new Note with no User attachment when unauthenticated', function () {
    config([
        'laravel-notes.auth.guards' => [],
    ]);

    /** @var Fridge $fridge */
    $fridge = Fridge::factory()->create();

    $contents = fake()->text;

    $note = $fridge->note(contents: $contents);

    expect($note)
        ->contents
        ->toBe($contents);

    /* @var LaravelNotesTestCase $this */
    $this->assertDatabaseHas(table: 'notes', data: [
        'id' => 1,
        'user_id' => null,
        'user_type' => null,
        'notable_id' => $fridge->id,
        'notable_type' => get_class($fridge),
        'contents' => $contents,
    ]);
});

it('can create a new Note with User attachment when authenticated', function () {
    /** @var User $user */
    $user = User::factory()->create();

    actingAs(user: $user);

    /** @var Fridge $fridge */
    $fridge = Fridge::factory()->create();

    $contents = fake()->text;

    $note = $fridge->note(contents: $contents);

    expect($note)
        ->contents
        ->toBe($contents);

    $this->assertDatabaseHas(table: 'notes', data: [
        'id' => 1,
        'user_id' => $user->id,
        'user_type' => get_class($user),
        'notable_id' => $fridge->id,
        'notable_type' => get_class($fridge),
        'contents' => $contents,
    ]);
});

it('can create a new Note with User attachment when authenticated via a custom UserResolver', function () {
    config([
        'laravel-notes.auth.user.resolver' => TestUserResolver::class,
    ]);

    /** @var Fridge $fridge */
    $fridge = Fridge::factory()->create();

    $contents = fake()->text;

    $note = $fridge->note(contents: $contents);

    expect($note)
        ->contents
        ->toBe($contents);

    $this->assertDatabaseHas(table: 'notes', data: [
        'id' => 1,
        'user_id' => null,
        'user_type' => null,
        'notable_id' => $fridge->id,
        'notable_type' => get_class($fridge),
        'contents' => $contents,
    ]);
});

it('can get attached Notes', function () {
    /** @var Fridge $fridge */
    $fridge = Fridge::factory()->create();

    $firstNote = $fridge->note(contents: fake()->text);
    $secondNote = $fridge->note(contents: fake()->text);

    $notes = $fridge->notes;

    expect($notes)
        ->toBeInstanceOf(Collection::class)
        ->and($notes->get(0)->id)
        ->toEqual($firstNote->id)
        ->and($notes->get(1)->id)
        ->toEqual($secondNote->id);
});

it('can get the latest attached Note', function () {
    /** @var Fridge $fridge */
    $fridge = Fridge::factory()->create();

    $fridge->note(contents: fake()->text);

    $secondNote = $fridge->note(contents: fake()->text);

    $latestNote = $fridge->latestNote();

    expect($latestNote)
        ->toBeInstanceOf(Note::class)
        ->and($latestNote->id)
        ->toEqual($secondNote->id);
});

it('can get the oldest attached Note', function () {
    /** @var Fridge $fridge */
    $fridge = Fridge::factory()->create();

    $firstNote = $fridge->note(contents: fake()->text);

    $fridge->note(contents: fake()->text);

    $oldestNote = $fridge->oldestNote();

    expect($oldestNote)
        ->toBeInstanceOf(Note::class)
        ->and($oldestNote->id)
        ->toEqual($firstNote->id);
});
