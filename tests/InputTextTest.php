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

    /**
     * プレースホルダー属性取得テスト
     * 
     * @return void
     */
    public function testGetPlaceholderAttribute(): void
    {
        $label = 'label text';
        $placeholder = 'placeholder text';
        $ins = new InputText;
        $ins->label = $label;

        $this->assertEmpty($ins->getPlaceholderAttribute());
        $this->assertEmpty($ins->placeholder);

        // without_label == true && required == false
        $ins->without_label = true;
        $this->assertEquals($label, $ins->getPlaceholderAttribute());
        $this->assertEquals($label, $ins->placeholder);

        // witout_lavel == true && required == true
        $ins->required = true;
        $this->assertEquals($label, $ins->getPlaceholderAttribute());
        $this->assertEquals($label, $ins->placeholder);

        // without_lavel == false && require == true
        $ins->without_label = false;
        $this->assertEquals('messages.require', $ins->getPlaceholderAttribute());
        $this->assertEquals('messages.require', $ins->placeholder);

        // placeholder登録あり
        $ins->placeholder = $placeholder;
        $this->assertEquals($placeholder, $ins->getPlaceholderAttribute());
        $this->assertEquals($placeholder, $ins->placeholder);
    }
}