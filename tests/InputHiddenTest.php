<?php

namespace LLkumaLL\FormView\Tests;

use LLkumaLL\FormView\InputHidden;
use PHPUnit\Framework\TestCase;

class InputHiddenTest extends TestCase
{
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
        $this->assertEquals($expected, $this->type);
    }
}