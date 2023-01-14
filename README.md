# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/othyn/laravel-notes.svg?style=flat-square)](https://packagist.org/packages/othyn/laravel-notes)
[![Total Downloads](https://img.shields.io/packagist/dt/othyn/laravel-notes.svg?style=flat-square)](https://packagist.org/packages/othyn/laravel-notes)

Assign notes to any model entity with ease.

Heavily inspired by https://github.com/owen-it/laravel-auditing.

## Installation

You can install the package via composer:

```shell
composer require othyn/laravel-notes
```

Then publish the configuration and migrations into your application scope using via:

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

## Usage

```php
// Usage description here
```

### Testing

```shell
composer test
```

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
