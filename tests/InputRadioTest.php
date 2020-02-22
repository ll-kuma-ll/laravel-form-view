<?php

namespace LLkumaLL\FormView\Tests;

use LLkumaLL\FormView\Contracts\InputRadio as ContractsInputRadio;
use LLkumaLL\FormView\InputRadio;
use PHPUnit\Framework\TestCase;

class InputRadioTest extends TestCase
{
    /**
     * インターフェース実装テスト
     * 
     * @return void
     */
    public function testIsSubclassOf(): void
    {
        $this->assertTrue(is_subclass_of(InputRadio::class, ContractsInputRadio::class));
    }

    /**
     * 選択済み判定テスト
     * 
     * @return void
     */
    public function testIsSelected(): void
    {
        $ins = new InputRadio('name', 'selected');
        $this->assertTrue($ins->isSelected('selected'));
        $this->assertFalse($ins->isSelected('unselected'));
    }

    /**
     * type属性テスト
     * 
     * @return void
     */
    public function testType(): void
    {
        $ins = new InputRadio;
        $this->assertEquals('radio', $ins->type);
    }
}