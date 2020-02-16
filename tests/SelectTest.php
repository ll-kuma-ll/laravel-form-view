<?php

namespace LLkumaLL\FormView\Tests;

use LLkumaLL\FormView\{
    Input,
    Select
};
use LLkumaLL\FormView\Contracts\{
    Select as ContractsSelect,
    SingleChoice
};
use PHPUnit\Framework\TestCase;

class SelectTest extends TestCase
{
    /**
     * 継承テスト
     * 
     * @return void
     */
    public function testIsSubclassOf(): void
    {
        $this->assertTrue(is_subclass_of(Select::class, Input::class));
        $this->assertTrue(is_subclass_of(Select::class, ContractsSelect::class));
        $this->assertTrue(is_subclass_of(Select::class, SingleChoice::class));
    }
}