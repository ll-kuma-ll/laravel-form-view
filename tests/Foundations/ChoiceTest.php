<?php

namespace LLkumaLL\FormView\Tests\Foundations;

use Illuminate\Support\Collection;
use LLkumaLL\FormView\Foundations\Choice;
use PHPUnit\Framework\TestCase;

class ChoiceTest extends TestCase
{
    /**
     * 選択項目テスト
     * 
     * @return void
     */
    public function testSelectListAttribute(): void
    {
        $mock = $this->getMockForTrait(Choice::class);
        $selectList = new \ReflectionProperty($mock, 'selectList');
        $selectList->setAccessible(true);

        $this->assertSame([], $mock->getSelectListAttribute());

        $expected = ['a' => 'AA', 'b' => 'BB'];
        $mock->setSelectListAttribute($expected);
        $this->assertEquals($expected, $selectList->getValue($mock));

        $expected['c'] = 'CC';
        $mock->addSelectList('c', 'CC');
        $this->assertArrayHasKey('c', $selectList->getValue($mock));
        $this->assertEquals($expected, $selectList->getValue($mock));
    }

    /**
     * イテレーターテスト
     * 
     * @return void
     * @depends testSelectListAttribute
     */
    public function testGetIterator(): void
    {
        $mock = $this->getMockForTrait(Choice::class);
        $mock->addSelectList('test', 'value');
        $this->assertInstanceOf(Collection::class, $mock->getIterator());
        $this->assertEquals(['test' => 'value'], $mock->getIterator()->toArray());
    }
}