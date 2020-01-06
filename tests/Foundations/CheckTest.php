<?php

namespace LLkumaLL\FormView\Tests\Foundations;

use LLkumaLL\FormView\Foundations\Check;
use PHPUnit\Framework\TestCase;

class CheckTest extends TestCase
{
    /**
     * インライン設定テスト
     * 
     * @return void
     */
    public function testSetInlineAttributeTest(): void
    {
        $mock = $this->getMockForTrait(Check::class);
        $inline = new \ReflectionProperty($mock, 'inline');
        $inline->setAccessible(true);

        // メソッド実行前
        $this->assertFalse($inline->getValue($mock), 'Before exec method.');

        // メソッド実行
        $mock->setInlineAttribute(true);
        $this->assertTrue($inline->getValue($mock), 'After exec method.');
    }
}