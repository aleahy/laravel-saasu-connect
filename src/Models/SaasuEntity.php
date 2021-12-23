<?php

namespace Aleahy\LaravelSaasuConnect\Models;

use Illuminate\Database\Eloquent\Model;

class SaasuEntity extends Model
{
    protected $guarded = [];

    public function entity()
    {
        return $this->morphTo(__FUNCTION__, 'model_type', 'model_id');
    }
}