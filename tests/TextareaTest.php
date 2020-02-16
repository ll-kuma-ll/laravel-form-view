<?php

namespace LLkumaLL\FormView\Tests;

use LLkumaLL\FormView\{
    Input,
    Textarea
};
use LLkumaLL\FormView\Contracts\{
    InputGroup,
    Textarea as ContractsTextarea
};
use PHPUnit\Framework\TestCase;

class TextareaTest extends TestCase
{
    /**
     * 継承テスト
     * 
     * @return void
     */
    public function testIsSbuclassOf(): void
    {
        $this->assertTrue(is_subclass_of(Textarea::class, Input::class));
        $this->assertTrue(is_subclass_of(Textarea::class, ContractsTextarea::class));
        $this->assertTrue(is_subclass_of(Textarea::class, InputGroup::class));
    }
}