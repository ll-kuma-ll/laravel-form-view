<?php

namespace LLkumaLL\FormView\Tests;

use LLkumaLL\FormView\Contracts\InputHidden as ContractsInputHidden;
use LLkumaLL\FormView\InputHidden;
use PHPUnit\Framework\TestCase;

class InputHiddenTest extends TestCase
{
    /**
     * インターフェース実装テスト
     * 
     * @return void
     */
    public function testIsSubclassOf(): void
    {
        $this->assertTrue(is_subclass_of(InputHidden::class, ContractsInputHidden::class));
    }

    /**
     * type属性取得テスト
     * 
     * @return void
     */
    public function testGetTypeAttribute(): void
    {
        $expected = 'hidden';
        $ins = new InputHidden;
        $this->assertEquals($expected, $ins->getTypeAttribute());
        $this->assertEquals($expected, $ins->type);
    }
}