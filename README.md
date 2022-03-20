# Laravel Saasu Connect
A Laravel wrapper for SaasuConnect

## Overview
This package can be imported into laravel to be able to make requests on the Saasu API.

## Installation
```bash
composer require aleahy/laravel-saasu-connect
```
Then publish the config file to be able to access your saasu username, password and File ID.
```bash
php artisan vendor:publish --provider="Aleahy\LaravelSaasuConnect\ServiceProvider" --tag=config
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

`getAllEntities` - Returns all the entities in a single array.
### Available Entities
- Company
- Contact
- Invoice

## HasSaasuEntity Trait
Models can also be associated with a saasu id. This trait adds a SaasuEntity `hasOne` relationship
which holds the saasu ID.

Adding the trait ```HasSaasuEntity``` to your models assigns
them a model to manually track the saasu id.

### Installation
Add the trait ```HasSaasuEntity``` to your model.

You will also need to publish the migration to store the saasu id.
```php
php artisan vendor:publish --provider="Aleahy\LaravelSaasuConnect\ServiceProvider" --tag=migrations
```
### Available methods
`setSaasuID` - set the value of the saasu id for the model.

`getSaasuID` - returns the value of the saasu id for the model.

`hasSaasuID` - returns true or false, depending on if the saasuID value has been set.