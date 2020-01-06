<?php

namespace LLkumaLL\FormView\Tests\Foundations;

use LLkumaLL\FormView\Foundations\Choice;
use LLkumaLL\FormView\Foundations\SingleChoice;
use PHPUnit\Framework\TestCase;
use Mockery as M;

class SingleChoiceTest extends TestCase
{
    /**
     * 選択済み判定テスト
     * 
     * @return void
     */
    public function testIsSelected(): void
    {
        $mock = M::mock(SingleChoice::class, function($m) {
            $m->shouldReceive('getAttribute')
                ->with('value')
                ->andReturn('selected value');
            $m->makePartial();
        });
        $this->assertIsBool($mock->isSelected('test'));
        $this->assertFalse($mock->isSelected('unselected value'));
        $this->assertTrue($mock->isSelected('selected value'));
    }
}
