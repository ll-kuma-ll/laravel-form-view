<?php

namespace LLkumaLL\FormView\Tests\Foundations;

use LLkumaLL\FormView\Foundations\ValueByModelAndUser;
use PHPUnit\Framework\TestCase;
use Mockery as M;
use stdClass;

class ValueByModelAndUserTest extends TestCase
{
    public function tearDown(): void
    {
        M::close();
    }

    /**
     * value属性設定テスト
     * 
     * @return void
     */
    public function testSetValueAttribute(): void
    {
        $mock = M::mock(ValueByModelAndUser::class, function($m) {
            $m->shouldReceive('getAttribute')
                ->with('name')
                ->twice()
                ->andReturn('test_field');
            $m->shouldReceive('setAttribute')
                ->with('value', 'string')
                ->once();
            $m->shouldReceive('setAttribute')
                ->with('value', 'object')
                ->once();
            $m->makePartial();
        });
        $model = new stdClass;
        $model->test_field = 'object';

        // モックで検証
        $this->assertNull($mock->setValueAttribute('string'));
        $this->assertNull($mock->setValueAttribute($model));
    }
}