<?php

namespace Aleahy\LaravelSaasuConnect\Tests;

use Aleahy\LaravelSaasuConnect\Traits\HasSaasuEntity;

class Entity extends \Illuminate\Database\Eloquent\Model
{
    use HasSaasuEntity;

    public $timestamps = false;
    protected $table = 'entities';
}