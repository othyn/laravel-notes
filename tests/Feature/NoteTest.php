<?php

declare(strict_types=1);

namespace Othyn\LaravelNotes\Tests\Feature;

use Othyn\LaravelNotes\Tests\Models\Fridge;
use Othyn\LaravelNotes\Tests\Models\User;

it('can get the Notable', function () {
    /** @var Fridge $fridge */
    $fridge = Fridge::factory()->create();

    $note = $fridge->note(contents: fake()->text);

    $notable = $note->notable;

    expect($notable)
        ->toBeInstanceOf(Fridge::class)
        ->and($notable->id)
        ->toEqual($fridge->id);
});

it('can get the User', function () {
    /** @var User $user */
    $user = User::factory()->create();

    actingAs(user: $user);

    /** @var Fridge $fridge */
    $fridge = Fridge::factory()->create();

    $note = $fridge->note(contents: fake()->text);

    $noteUser = $note->user;

    expect($noteUser)
        ->toBeInstanceOf(User::class)
        ->and($noteUser->id)
        ->toEqual($user->id);
});
