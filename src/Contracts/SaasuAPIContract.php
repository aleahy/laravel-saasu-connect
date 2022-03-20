<?php

namespace Aleahy\LaravelSaasuConnect\Contracts;

interface SaasuAPIContract
{
    public function findEntities(string $entityName, array $searchParameters);
    public function getAllEntities(string $entityName, array $searchParams = []);
    public function insertEntity(string $entityName, array $attributes);
    public function getEntity(string $entityName, int $id);
    public function updateEntity(string $entityName, int $id, array $attributes);
}