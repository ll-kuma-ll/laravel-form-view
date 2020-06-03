<?php

namespace LLkumaLL\FormView\Tests;

use LLkumaLL\FormView\Contracts\Input as ContractsInput;
use PHPUnit\Framework\TestCase;
use LLkumaLL\FormView\Input;

class InputTest extends TestCase
{
    /**
     * インターフェース実装テスト
     * 
     * @return void
     */
    public function testIsSubclassOf(): void
    {
        $this->assertTrue(is_subclass_of(Input::class, ContractsInput::class));
    }

    /**
     * setupテスト
     * 
     * @return void
     */
    public function testSetup(): void
    {
        $ins = new Input;
        $casts = new \ReflectionProperty(Input::class, 'casts');
        $casts->setAccessible(true);
        $actual = $casts->getValue($ins);

        $this->assertArrayHasKey('required', $actual);
        $this->assertEquals('bool', $actual['required']);
    }

    /**
     * id属性取得テスト
     * 
     * @return void
     */
    public function testGetIdAttribute(): void
    {
        $ins = new Input;
        $this->assertRegExp('/^input_[a-z0-9]+/', $ins->getIdAttribute(), 'The attribute of id and name are not exists');

        $ins->name('test_name');
        $this->assertEquals('input_test_name', $ins->getIdAttribute(), 'The attribute of id is not exist.');

        $ins->id('test_id');
        $this->assertEquals('test_id', $ins->getIdAttribute());
    }

    /**
     * col値設定テスト
     *
     * @return void
     */
    public function testColAttribute(): void
    {
        $col = new \ReflectionProperty(Input::class, 'col');
        $col->setAccessible(true);

        $expected = 3;
        $ins = new Input;
        $ins->setColAttribute($expected);
        $actual = $col->getValue($ins);

        $this->assertEquals($expected, $actual);
        $this->assertEquals($expected, $ins->getColAttribute());
    }
}
