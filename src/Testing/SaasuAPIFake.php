<?php

namespace Aleahy\LaravelSaasuConnect\Testing;

use Aleahy\LaravelSaasuConnect\Contacts\SaasuAPIContact;
use Aleahy\SaasuConnect\Entities\Company;
use Aleahy\SaasuConnect\Entities\Contact;
use PHPUnit\Framework\Assert;

class SaasuAPIFake implements SaasuAPIContact
{
    private array $insertions = [];

    public function assertInsertSentToSaasu(string $entityName, array $attributes = [])
    {
        Assert::assertTrue($this->insertSent($entityName, $attributes));
    }

    public function assertNothingSentToSaasu()
    {
        Assert::assertTrue(count($this->insertions) === 0);
    }

    protected function insertSent(string $entityName, $attributes) {
        foreach($this->insertions as $insert) {
            if ($insert['entity'] === $entityName &&
                $this->arrayContainsFragment($insert['attributes'], $attributes)) {

                return true;
            }
        }

        return false;
    }
    public function arrayContainsFragment(array $origArray, array $fragment) {
        foreach($fragment as $key => $item) {
            switch(true) {
                case !array_key_exists($key, $origArray):
                    return false;
                    break;

                case is_array($item) && is_array($origArray[$key]):
                    if (!$this->arrayContainsFragment($origArray[$key], $item)) {
                        return false;
                    }
                    break;

                case is_array($item) && !is_array($origArray[$key]):
                    return false;
                    break;

                default:
                    if ($fragment[$key] !== $origArray[$key]) {
                        return false;
                    }
            }
        }
        return true;
    }
    public function findEntities(string $entityName, array $searchParameters)
    {

    }

    public function getAllEntities(string $entityName, array $searchParams = [])
    {
        // TODO: Implement getAllEntities() method.
    }

    public function insertEntity(string $entityName, array $attributes)
    {
        $this->insertions[] = [
            'entity' => $entityName,
            'attributes' => $attributes
        ];

        switch($entityName) {
            case Company::class:
                $insertedIDKey = 'InsertedCompanyId';
                break;

            case Contact::class:
                $insertedIDKey = 'InsertedContactId';
                break;

            default:
                $insertedIDKey = 'InsertedEntityId';
        }
        return [
            $insertedIDKey => '12345'
        ];
    }

    public function getEntity(string $entityName, int $id)
    {
        // TODO: Implement getEntity() method.
    }

    public function updateEntity(string $entityName, int $id, array $attributes)
    {
        // TODO: Implement updateEntity() method.
    }
}