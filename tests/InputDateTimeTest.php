<?php

namespace LLkumaLL\FormView\Tests;

use Carbon\Carbon;
use LLkumaLL\FormView\Contracts\InputDateTime as ContractsInputDateTime;
use LLkumaLL\FormView\{
    InputDateTime,
    InputText
};
use PHPUnit\Framework\TestCase;

class InputDateTimeTest extends TestCase
{
    /**
     * 継承テスト
     * 
     * @return void
     */
    public function testIsSubclassOf(): void
    {
        $this->assertTrue(is_subclass_of(InputDateTime::class, ContractsInputDateTime::class));
        $this->assertTrue(is_subclass_of(InputDateTime::class, InputText::class));
    }

    /**
     * type属性テスト
     * 
     * @return void
     */
    public function testType(): void
    {
        $ins = new InputDateTime;
        $this->assertEquals('datetime-local', $ins->type);
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
        $model->test_datetime = $date;

        $ins = (new InputDateTime('test_datetime'))->value($model);
        $this->assertIsString($ins->value);
        $this->assertEquals($date->toDateTimeString(), $ins->value);

        $ins->value('string');
        $this->assertEquals('string', $ins->value);
    }
}
