<?php

namespace LLkumaLL\FormView\Tests;

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
}