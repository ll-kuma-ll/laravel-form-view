<?php

namespace LLkumaLL\FormView\Tests;

use LLkumaLL\FormView\Contracts\InputText as ContractsInputText;
use LLkumaLL\FormView\InputText;
use PHPUnit\Framework\TestCase;

class InputTextTest extends TestCase
{
    /**
     * インターフェース実装テスト
     * 
     * @return void
     */
    public function testIsSubclassOf(): void
    {
        $this->assertTrue(is_subclass_of(InputText::class, ContractsInputText::class));
    }

    /**
     * type属性取得テスト
     * 
     * @return void
     */
    public function testGetType(): void
    {
        $ins = new InputText;
        $this->assertEquals('text', $ins->getTypeAttribute());
        $this->assertEquals('text', $ins->type);
    }
}