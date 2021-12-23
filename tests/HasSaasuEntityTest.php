<?php

namespace Aleahy\LaravelSaasuConnect\Tests;

use Aleahy\LaravelSaasuConnect\Models\SaasuEntity;

class HasSaasuEntityTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_be_assigned_a_saasu_id()
    {
        $this->assertNull($this->testEntity->saasuEntity);

        $this->testEntity->setSaasuId(5);

        $this->assertEquals(5, $this->testEntity->refresh()->saasuEntity->saasu_id);

        $this->assertDatabaseHas('saasu_entities', [
            'model_id' => $this->testEntity->id,
            'model_type'=> Entity::class,
            'saasu_id' => 5
        ]);
    }

    /**
     * @test
     */
    public function it_can_get_its_saasu_id()
    {
        $this->assertNull($this->testEntity->getSaasuId());

        $this->testEntity->setSaasuId(5);

        $this->assertEquals(5, $this->testEntity->refresh()->getSaasuId());
    }

    /**
     * @test
     */
    public function test_it_can_update_a_saasu_id()
    {
        $this->testEntity->setSaasuId(5);

        $this->assertEquals(5, $this->testEntity->refresh()->getSaasuId());

        $this->testEntity->setSaasuId(6);

        $this->assertEquals(6, $this->testEntity->refresh()->getSaasuId());
    }

    /**
     * @test
     */
    public function test_it_can_check_if_it_has_a_saasu_id()
    {
        $this->assertFalse($this->testEntity->hasSaasuId());

        $this->testEntity->setSaasuId(5);

        $this->assertTrue($this->testEntity->hasSaasuId());
    }
}