<?php

namespace LLkumaLL\FormView\Tests;

use LLkumaLL\FormView\InputPassword;
use PHPUnit\Framework\TestCase;

class InputPasswordTest extends TestCase
{
    /**
     * type属性取得テスト
     * 
     * @return void
     */
    public function testGetTypeAttribute(): void
    {
        $expected = 'password';
        $ins = new InputPassword;
        $this->assertEquals($expected, $ins->getTypeAttribute());
        $this->assertEquals($expected, $ins->type);
    }
}