<?php

namespace LLkumaLL\FormView\Tests;

use Carbon\Carbon;
use LLkumaLL\FormView\Contracts\InputTime as ContractsInputTime;
use LLkumaLL\FormView\{
    InputText,
    InputTime
};
use PHPUnit\Framework\TestCase;

class InputTimeTest extends TestCase
{
    /**
     * 継承テスト
     * 
     * @return void
     */
    public function testIsSubclassOf(): void
    {
        $this->assertTrue(is_subclass_of(InputTime::class, ContractsInputTime::class));
        $this->assertTrue(is_subclass_of(InputTime::class, InputText::class));
    }

    /**
     * type属性テスト
     * 
     * @return void
     */
    public function testType(): void
    {
        $ins = new InputTime;
        $this->assertEquals('time', $ins->type);
    }

    /**
     * value属性取得テスト
     *
     * @return void
     */
    public function testGetValueAttribute(): void
    {
        $date = Carbon::now();
        $model = new \stdClass;
        $model->test_time = $date;

        $ins = (new InputTime('test_time'))->value($model);
        $this->assertIsString($ins->value);
        $this->assertEquals($date->toTimeString(), $ins->value);

        $ins->value('string');
        $this->assertEquals('string', $ins->value);
    }
}
