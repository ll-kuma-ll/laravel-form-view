<?php

namespace LLkumaLL\FormView\Tests\Foundations;

use LLkumaLL\FormView\Foundations\InputGroup;
use PHPUnit\Framework\TestCase;

class InputGroupTest extends TestCase
{
    /**
     * 左側パーツテスト
     * 
     * @return void
     */
    public function testInputGroupPrepends(): void
    {
        $mock = $this->getMockForTrait(InputGroup::class);
        $this->assertSame([], $mock->getInputGroupPrependsAttribute());
        $this->assertFalse($mock->getUseInputGroupPrependAttribute());
        $this->assertFalse($mock->getUseInputGroupAttribute());

        $expected = ['first', 'second'];
        $mock->setInputGroupPrependsAttribute($expected);
        $this->assertEquals($expected, $mock->getInputGroupPrependsAttribute());
        $this->assertTrue($mock->getUseInputGroupPrependAttribute());
        $this->assertTrue($mock->getUseInputGroupAttribute());

        $expected[] = 'add';
        $this->assertInstanceOf(get_class($mock), $mock->addInputGroupPrepend('add'));
        $this->assertEquals($expected, $mock->getInputGroupPrependsAttribute());

        $expected = 'string';
        $mock->setInputGroupPrependsAttribute($expected);
        $this->assertEquals([$expected], $mock->getInputGroupPrependsAttribute());
    }

    /**
     * 右側パーツテスト
     * 
     * @return void
     */
    public function testInputGroupAppends(): void
    {
        $mock = $this->getMockForTrait(InputGroup::class);
        $this->assertSame([], $mock->getInputGroupAppendsAttribute());
        $this->assertFalse($mock->getUseInputGroupPrependAttribute());
        $this->assertFalse($mock->getUseInputGroupAttribute());

        $expected = ['first', 'second'];
        $mock->setInputGroupAppendsAttribute($expected);
        $this->assertEquals($expected, $mock->getInputGroupAppendsAttribute());
        $this->assertTrue($mock->getUseInputGroupAppendAttribute());
        $this->assertTrue($mock->getUseInputGroupAttribute());

        $expected[] = 'add';
        $this->assertInstanceOf(get_class($mock), $mock->addInputGroupAppend('add'));
        $this->assertEquals($expected, $mock->getInputGroupAppendsAttribute());

        $expected = 'string';
        $mock->setInputGroupAppendsAttribute($expected);
        $this->assertEquals([$expected], $mock->getInputGroupAppendsAttribute());
    }

    /**
     * 左右独立確認
     * 
     * @return void
     * @depends testInputGroupPrepends
     * @depends testInputGroupAppends
     */
    public function testPrependAndAppend(): void
    {
        $mock = $this->getMockForTrait(InputGroup::class);
        $mock->setInputGroupPrependsAttribute('prepend');
        $mock->setInputGroupAppendsAttribute('append');

        $this->assertEquals(['prepend'], $mock->getInputGroupPrependsAttribute());
        $this->assertEquals(['append'], $mock->getInputGroupAppendsAttribute());
        $this->assertTrue($mock->getUseInputGroupAttribute());
    }
}