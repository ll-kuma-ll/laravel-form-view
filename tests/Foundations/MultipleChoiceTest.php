<?php

namespace LLkumaLL\FormView\Tests\Foundations;

use LLkumaLL\FormView\Foundations\MultipleChoice;
use PHPUnit\Framework\TestCase;
use Mockery as M;

class MultipleChoiceTest extends TestCase
{
    /**
     * 選択済み判定テスト
     * 
     * @return void
     */
    public function testIsSelected(): void
    {
        $mock = M::mock(MultipleChoice::class, function($m) {
            $m->shouldReceive('getAttribute')
                ->with('value')
                ->andReturn(['selected 1', 'selected 2']);
            $m->makePartial();
        });
        $this->assertIsBool($mock->isSelected('test'));
        $this->assertFalse($mock->isSelected('unselected'));
        $this->assertTrue($mock->isSelected('selected 2'));
    }
}