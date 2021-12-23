<?php

namespace Aleahy\LaravelSaasuConnect\Traits;

use Aleahy\LaravelSaasuConnect\Models\SaasuEntity;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasSaasuEntity
{
    /**
     * Relationship to the model containing the saasu id
     * @return MorphOne
     */
    public function saasuEntity(): MorphOne
    {
        return $this->morphOne(SaasuEntity::class, 'model');
    }

    /**
     * Assign the saasu id
     * @param int $saasu_id
     * @return mixed $this
     */
    public function setSaasuId(int $saasu_id)
    {
        SaasuEntity::updateOrCreate(
            [
                'model_type' => self::class,
                'model_id' => $this->id,
            ],
            ['saasu_id' => $saasu_id]
        );

        return $this;
    }


    /**
     * Retrieve the saved saasu id
     * @return int|null
     */
    public function getSaasuId()
    {
        $this->load('saasuEntity');

        if ($this->saasuEntity) {
            return $this->saasuEntity->saasu_id;
        }
        return null;
    }


    /**
     * Determine if the model has a saasu id
     * @return bool
     */
    public function hasSaasuId(): bool
    {
        return (bool)$this->getSaasuId();
    }
}