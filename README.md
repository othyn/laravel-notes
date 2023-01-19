<div align="center">
    <img src="art/logo.svg" alt="logo" width="200" height="auto" />
    <h1>Laravel Notes</h1>
    <p>A centralised note store for any and all model entities. Finally, no longer a need for storing a notes field in each and every table! Ideal for system wide generic comment systems.</p>
</div>

<div align="center">
    <p>
        <a href="https://github.com/othyn/laravel-notes/actions/workflows/00-lint.yml">
            <img src="https://github.com/othyn/laravel-notes/actions/workflows/00-lint.yml/badge.svg" alt="lint action" />
        </a>
        <a href="https://github.com/othyn/laravel-notes/actions/workflows/10-tests.yml">
            <img src="https://github.com/othyn/laravel-notes/actions/workflows/10-tests.yml/badge.svg" alt="tests action" />
        </a>
        <a href="https://github.com/othyn/laravel-notes/actions/workflows/tests.yml">
            <img src="https://img.shields.io/badge/Test Coverage-100%25-green" alt="coverage" />
        </a>
        <a href="https://packagist.org/packages/othyn/laravel-notes">
            <img src="https://img.shields.io/packagist/v/othyn/laravel-notes.svg?style=flat" alt="packagist download" />
        </a>
        <a href="https://packagist.org/packages/othyn/laravel-notes">
            <img src="https://img.shields.io/packagist/dt/othyn/laravel-notes.svg?style=flat" alt="packagist downloads count" />
        </a>
        <a href="https://github.com/othyn/laravel-notes/graphs/contributors">
            <img src="https://img.shields.io/github/contributors/othyn/laravel-notes" alt="contributors" />
        </a>
        <a href="https://github.com/othyn/laravel-notes/network/members">
            <img src="https://img.shields.io/github/forks/othyn/laravel-notes" alt="forks" />
        </a>
        <a href="https://github.com/othyn/laravel-notes/stargazers">
            <img src="https://img.shields.io/github/stars/othyn/laravel-notes" alt="stars" />
        </a>
        <a href="https://github.com/othyn/laravel-notes/issues/">
            <img src="https://img.shields.io/github/issues/othyn/laravel-notes" alt="open issues" />
        </a>
        <a href="https://github.com/othyn/laravel-notes/blob/master/LICENSE">
            <img src="https://img.shields.io/github/license/othyn/laravel-notes" alt="license" />
        </a>
    </p>
</div>

<div align="center">
    <h4>
        <a href="#floppy_disk-install">Install Latest Version</a>
        <span> · </span>
        <a href="https://github.com/othyn/laravel-notes/issues">Report Bug</a>
        <span> · </span>
        <a href="https://github.com/othyn/laravel-notes/issues">Request Feature</a>
    </h4>
</div>

<!-- Table of Contents -->

## :notebook_with_decorative_cover: Table of Contents

- [About the Project](#star2-about-the-project)
    - [Tech Stack](#space_invader-tech-stack)
    - [Features](#dart-features)
- [Install](#floppy_disk-install)
    - [Version Matrix](#version-matrix)
- [Usage](#hammer_and_wrench-usage)
    - [Configuration](#wrench-configuration)
    - [Models](#elephant-models)
- [Contributing](#bread-contributing)
    - [Project Tooling Quick Reference](#toolbox-project-tooling-quick-reference)
- [Changelog](https://github.com/othyn/laravel-notes/releases)
- [License](#warning-license)
- [Acknowledgements](#gem-acknowledgements)

<!-- About the Project -->

## :star2: About the Project

On a recent personal project, I was finding that I was utilising a `notes` field against practically all tables, with
the functionality also shared. The idea being that the user could quickly leave notes against any entity in the system,
in which centralising that saves a load of overhead in each table and repeat code. I also make use of a
shared [Livewire table](https://github.com/rappasoft/laravel-livewire-tables) that automatically
loads [Audit's](https://github.com/owen-it/laravel-auditing) (in which the awesome design of that package inspired
this one) for a given Entity when viewing it. The table is automatically injected into the rendered view determined
automatically by the URL slug, which was a perfect use case to replicate for the `notes` system, thus this library
was born.

<!-- TechStack -->

### :space_invader: Tech Stack

<ul>
    <li>Language: <a href="https://www.php.net/">PHP</a></li>
    <li>Dependency Manager: <a href="https://getcomposer.org/">Composer</a></li>
    <li>Framework: <a href="https://laravel.com/">Laravel</a></li>
    <li>Package: <a href="https://github.com/illuminate/support">illuminate/support</a></li>
    <li>Package: <a href="https://github.com/orchestra/testbench">orchestra/testbench</a></li>
    <li>Package: <a href="https://github.com/pestphp/pest">pestphp/pest</a></li>
    <li>Package: <a href="https://github.com/phpunit/phpunit">phpunit/phpunit</a></li>
    <li>Package: <a href="https://github.com/friendsofphp/php-cs-fixer">friendsofphp/php-cs-fixer</a></li>
</ul>

<!-- Features -->

### :dart: Features

- Centralised note store against any Model entity
- Saves replicating repetitive fields and functionality across many tables
- Quickly apply the functionality to any Model with an interface and trait combo
- Easily overridable User resolver for custom auth scenarios
- Highly customisable and overridable
- Up and running in minutes

Future addition ideas to play around with:

- Some form of automated (customisable) injectable component for Blade and/or Livewire with backed CRUD functionality.
- Expanding this out to quickly capture *any* set of recurring fields out across all tables with ease, could be an
  interesting project enhancement

<!-- Install -->

## :floppy_disk: Install

Installation can be done via [Composer](https://getcomposer.org/):

```sh
composer require othyn/laravel-notes
```

Then publish the configuration file and migration(s) into your application scope via:

```shell
# Config
php artisan vendor:publish \
    --provider="Othyn\\LaravelNotes\\LaravelNotesServiceProvider" \
    --tag="config"

# Migrations
php artisan vendor:publish \
    --provider="Othyn\\LaravelNotes\\LaravelNotesServiceProvider" \
    --tag="migrations"
```

Remember to check the default configuration aligns with your requirements (amending if necessary) and **run your
migrations to generate the new `notes` table!**

Next you are going to want to head down to the [configuration](#wrench-configuration), so lets get started
on [usage](#hammer_and_wrench-usage)! See you there.

### Version Matrix

Here is the current version matrix for project supported versions of used frameworks and libraries.

| Notes Version | PHP Version | Laravel Version |
|---------------|-------------|-----------------|
| `1.0.0`       | `^8.1`      | `^9.0`          |

If you require support for an older version of Laravel, submit an issue as we may be able to look into dropping the
version requirements down, as I don't think it needs to be this new. Or, feel free to submit a PR!

<!-- Usage -->

## :hammer_and_wrench: Usage

Laravel Notes is simple in its implementation, to get started all you need to do is add the relevant interface and trait
combo the Model you wish to store notes against.

### :elephant: Models

So, you want to use Laravel Notes eh? I like you, lets get cooking. All you need to do is add the relevant interface
and trait combo the Model you wish to store notes against:

```php
<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * What better place to store notes. 
 */
class Fridge extends Model implements \Othyn\LaravelNotes\Contracts\Notable
{
    use \Othyn\LaravelNotes\Traits\Notable;
}

```

That's it!

The following methods and properties will be exposed against the model:

```php
<?php

declare(strict_types=1);

$fridge = Fridge::first();

// Gets an Eloquent Collection of all Notes currently attached to the Fridge, this is a magic implementation that 
//  Laravel automagically generates based on the `notes()` relationship
$notes = $fridge->notes;

// Gets the latest Note that was attached to the Fridge
$latestNote = $fridge->latestNote();

// Gets the oldest Note that was attached to the Fridge
$oldestNote = $fridge->oldestNote();

// Create a new Note on the Fridge, with the authentication relation being automatically captured at creation if
//  applicable, returns the created Note
$note = $fridge->note(contents: 'Remember to buy some chocolate');

// From the Note instance, you can also get the attached Notable instance, in this case the Fridge, this is a magic
//  implementation that Laravel automagically generates based on the `notable()` relationship
$notable = $note->notable;

// From the Note instance, you can also get the attached User instance, in this case the default User implementation,
//  this is a magic implementation that Laravel automagically generates based on the `user()` relationship
$user = $note->user;
```

As we are dealing with native Laravel relationships, all the usual Eloquent stuff also applies against the
relationship method that is used:

```php
<?php

declare(strict_types=1);

$fridge = Fridge::first();

// Gets a Note by its ID on a Fridge
$note = $fridge->notes()->find(7);

// Get all Notes on the Fridge with who wrote them
$notes = $fridge->notes()->with('user')->get();
```

There is IDE type hinting baked into the Contracts to assist with the above.

If you need to go beyond that and really turn things up to 11, lets touch on what the configuration can do for you.

### :wrench: Configuration

Given we published the configuration as part of the installation, you should now have an `config/laravel-notes.php`
file within your project that you can edit. Below is a little detail on what each configuration option means and
what it can do for you.

- `note`
    - Type: `\Othyn\LaravelNotes\Contracts\Note`
    - Default: `\Othyn\LaravelNotes\Models\Note::class`
    - Description:
        - The Model instance to use to refer to a `Note`, that implements `\Othyn\LaravelNotes\Contracts\Note`.
        - You can make use of the `\Othyn\LaravelNotes\Traits\Note` trait to implement base functionality if desired
          in any custom implementation you make.
- `auth.guards`
    - Type: `array<string>`
    - Default: `['web', 'api']`
    - Description:
        - The Laravel Auth guards that should be polled to determine the logged in `User` to bind to the `Note`.
- `auth.user.field_prefix`
    - Type: `string`
    - Default: `user`
    - Description:
        - The polymorphic relationship field prefix, will be used as `{field_prefix}_id` and `{field_prefix}_type`
          within the `notes` table.
- `auth.user.resolver`
    - Type: `\Othyn\LaravelNotes\Contracts\UserResolver`
    - Default: `\Othyn\LaravelNotes\Resolvers\UserResolver::class`
    - Description:
        - The object that should resolve the Authenticatable `Entity` that will be bound to the `Note`, the `id` of
          the entity is all that matters.
        - You can easily implement your own resolver using the `\Othyn\LaravelNotes\Contracts\UserResolver` contract.
        - Must return an instance of `\Illuminate\Contracts\Auth\Authenticatable` or `null` as the user value.
- `database.connection`
    - Type: `string`
    - Default: `config('database.default')`
    - Description:
        - The database connection that should be used for all notes related activity.
        - When determining the default value, it will be read from the `LARAVEL_NOTES_CONNECTION` environment variable
          first, before reading the Laravel default `database.default` config value.
- `database.table`
    - Type: `string`
    - Default: `notes`
    - Description:
        - The database table that should be used for notes storage.
        - When determining the default value, it will be read from the `LARAVEL_NOTES_TABLE` environment variable
          first, before setting it to the pre-defined default value specified above.

That's it! Want to contribute? Keep reading.

<!-- Contributing -->

## :bread: Contributing

See the [contribution guide](CONTRIBUTING.md) on how to get started. Thank you for contributing!

### :toolbox: Project Tooling Quick Reference

There are only a few project commands, and it's the usual stuff:

```sh
# Lets make sure things are formatted correctly.
$ composer php-cs-fixer

# Lets make sure things are still functioning as intended.
$ composer test

# Lets make sure things are still functioning as intended, this time with code coverage reporting.
$ composer test-coverage
```

That's about it, go make something cool and submit a PR!

<!-- License -->

## :warning: License

Distributed under the MIT License. See [LICENSE](https://github.com/othyn/laravel-notes/blob/main/LICENSE) for more
information.

<!-- Acknowledgments -->

## :gem: Acknowledgements

Useful resources and libraries that have been used in the making of this project.

- Readme: [Louis3797/awesome-readme-template](https://github.com/Louis3797/awesome-readme-template)
- Readme: [ikatyang/emoji-cheat-sheet](https://github.com/ikatyang/emoji-cheat-sheet)
- Readme: [shields.io](https://shields.io/)
- Logo: [Tag SVG Vector 242](https://www.svgrepo.com/svg/411760/tag)
    - From the [Cube Icon Collection](https://www.svgrepo.com/collection/cube-action-icons/)
    - Licenced under the [CC Attribution License](https://www.svgrepo.com/page/licensing)
- Starter: [Laravel Package Boilerplate](https://laravelpackageboilerplate.com)
- Inspiration: [owen-it/laravel-auditing](https://github.com/owen-it/laravel-auditing)
