<?php

namespace LLkumaLL\FormView\Tests;

use LLkumaLL\FormView\{
    InputDate,
    InputText
};
use LLkumaLL\FormView\Contracts\InputDate as ContractsInputDate;
use PHPUnit\Framework\TestCase;

class InputDateTest extends TestCase
{
    /**
     * 継承テスト
     * 
     * @return void
     */
    public function testIsSubclassOf(): void
    {
        $this->assertTrue(is_subclass_of(InputDate::class, InputText::class));
        $this->assertTrue(is_subclass_of(InputDate::class, ContractsInputDate::class));
    }

    /**
     * type属性テスト
     * 
     * @return void
     */
    public function testType(): void
    {
        $actual = (new InputDate)->type;
        $this->assertEquals('date', $actual);
    }
}