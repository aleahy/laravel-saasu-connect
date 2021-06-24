# Laravel Saasu Connect
A Laravel wrapper for SaasuConnect

## Overview
This package can be imported into laravel to be able to make requests on the Saasu API.

## Installation
This is a private repository, so a few steps must be completed to make sure it can be installed.
1. Add the repository to `composer.json`
```php
"repositories":[
    {
        "type": "vcs",
        "url": "git@github.com:aleahy/laravel-saasu-connect.git"
    }
]
```

2. Ensure the server has an ssh key configured to connect to github.
3. Install the package.
```php
composer require aleahy/laravel-saasu-connect
```

## Usage
Use the SaasuAPI facade to be able to make the calls on the Saasu API.

```php
use Aleahy\LaravelSaasuConnect\Facade\SaasuAPI;
use Aleahy\SaasuConnect\Entities\Invoice as SaasuInvoice;

SaasuAPI::findEntity(SaasuInvoice::class, [
  'AmountOwed' => 490.0
]);
```

### Available Methods
The following methods currently exist:

`findEntity` - Finds the provided entity with the search attributes. Returns a collection of entities.

`insertEntity` - Makes a post request for the given entity with the provided attributes.

`getEntity` - Returns the specific entity with the given id.

### Available Entities
- Company
- Contact
- Invoice

