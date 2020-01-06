<?php

namespace LLkumaLL\FormView\Tests\Foundations;

use LLkumaLL\FormView\Foundations\FieldLabel;
use PHPUnit\Framework\TestCase;

class FieldLabelTest extends TestCase
{
    /**
     * 項目名称テスト
     * 
     * @return void
     */
    public function testFieldLabelAttribute(): void
    {
        $mock = $this->getMockForTrait(FieldLabel::class);
        $fieldLabel = new \ReflectionProperty($mock, 'fieldLabel');
        $fieldLabel->setAccessible(true);

        $expected = 'test label';
        $mock->setFieldLabelAttribute($expected);
        $this->assertEquals($expected, $fieldLabel->getValue($mock));
        $this->assertEquals($expected, $mock->getFieldLabelAttribute());
    }

    /**
     * 表示フラグテスト
     * 
     * @return void
     */
    public function testViewFieldLabelAttribute(): void
    {
        $mock = $this->getMockForTrait(FieldLabel::class);
        $fieldLabel = new \ReflectionProperty($mock, 'viewFieldLabel');
        $fieldLabel->setAccessible(true);

        $this->assertTrue($fieldLabel->getValue($mock), 'Before execute setViewFieldAttribute method.');
        $this->assertTrue($mock->getViewFieldLabelAttribute(), 'Before execute setViewFieldAttribute method.');

        $mock->setViewFieldLabelAttribute(false);
        $this->assertFalse($fieldLabel->getValue($mock));
        $this->assertFalse($mock->getViewFieldLabelAttribute());
    }
}