<?php

namespace LLkumaLL\FormView\Tests;

use LLkumaLL\FormView\Base;
use LLkumaLL\FormView\Button;
use PHPUnit\Framework\TestCase;

class ButtonTest extends TestCase
{
    /**
     * 継承テスト
     * 
     * @return void
     */
    public function testIsSubclassOf(): void
    {
        $this->assertTrue(is_subclass_of(Button::class, Base::class));
    }

    /**
     * type属性テスト
     * 
     * @return void
     */
    public function testType(): void
    {
        $ins = new Button;
        $this->assertEquals('button', $ins->type, '初期値としてbuttonが戻る');

        $ins->type = 'submit';
        $this->assertEquals('submit', $ins->type);
    }

    /**
     * id属性取得テスト
     * 
     * @return void
     */
    public function testId(): void
    {
        $ins = new Button;
        $this->assertRegExp('/^button_.+$/', $ins->id, '初期値としてinput_プレフィックスの文字列が戻る');

        $ins->id = 'custom_id';
        $this->assertEquals('custom_id', $ins->id);
    }
}