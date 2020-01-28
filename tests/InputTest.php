<?php

namespace LLkumaLL\FormView\Tests;

use Illuminate\Contracts\View\Engine;
use Illuminate\View\Factory;
use Illuminate\View\View;
use PHPUnit\Framework\TestCase;
use LLkumaLL\FormView\Input;

class InputTest extends TestCase
{
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
}