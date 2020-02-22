<?php

namespace LLkumaLL\FormView\Tests;

use LLkumaLL\FormView\Contracts\InputCheckbox as ContractsInputCheckbox;
use LLkumaLL\FormView\InputCheckbox;
use PHPUnit\Framework\TestCase;

class InputCheckboxTest extends TestCase
{
    /**
     * インターフェース実装テスト
     * 
     * @return void
     */
    public function testIsSubclassOf(): void
    {
        $this->assertTrue(is_subclass_of(InputCheckbox::class, ContractsInputCheckbox::class));
    }

    /**
     * 選択済み判定テスト
     * 
     * @return void
     */
    public function testIsSelected(): void
    {
        $ins = new InputCheckbox('test', ['selected1', 'selected2']);
        $this->assertTrue($ins->isSelected('selected2'));
        $this->assertFalse($ins->isSelected('unselected'));
    }

    /**
     * type属性テスト
     * 
     * @return void
     */
    public function testType(): void
    {
        $ins = new InputCheckbox();
        $this->assertEquals('checkbox', $ins->type);
    }
}