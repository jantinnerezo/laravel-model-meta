<?php

namespace Jantinnerezo\LaravelModelMeta\Tests;

use Jantinnerezo\LaravelModelMeta\Models\Dummy;
use Orchestra\Testbench\TestCase;

use Illuminate\Support\Collection;

class MetaTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        require_once __DIR__ . '/../database/migrations/create_dummies_table.php';

        (new \CreateDummiesTable())->up();
    }

    private function createModel(): Dummy
    {
        return Dummy::create([
            'name' => 'I am a dummy!'
        ]);
    }

    /** @test */
    public function model_has_meta_field()
    {
        $dummy = $this->createModel();

        $this->assertArrayHasKey('meta', $dummy->toArray());
    }

    /** @test */
    public function meta_field_is_should_return_collection()
    {
        $dummy = $this->createModel();

        $this->assertTrue($dummy->meta instanceof Collection);
    }

    /** @test */
    public function can_set_meta()
    {
        $dummy = $this->createModel();
        $dummy->setMeta('message', 'Very first meta key existed!');

        $this->assertTrue($dummy->meta->has('message'));
    }

    /** @test */
    public function can_sync_metas()
    {
        $dummy = $this->createModel();
        $dummy->syncMeta([
            'key_1' => 'This is a key 1',
            'key_2' => null
        ]);

        $this->assertTrue($dummy->meta->has(['key_1', 'key_2']));
    }

    /** @test */
    public function can_remove_meta()
    {
        $dummy = $this->createModel();
        $dummy->setMeta(
            'key_1',
            'This is a key 1',
        );

        $dummy->removeMeta('key_1');

        $this->assertFalse($dummy->meta->has('key_1'));
    }

    /** @test */
    public function is_meta_value_accurate()
    {
        $value = 'Hey jude';
        $dummy = $this->createModel();
        $dummy->setMeta(
            'title',
            $value
        );

        $this->assertTrue(
            $dummy->getMeta('title') === $value
        );
    }
}
