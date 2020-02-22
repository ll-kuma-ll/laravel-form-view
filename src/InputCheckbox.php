<?php

namespace LLkumaLL\FormView;

/**
 * チェックボックス
 * 
 */
class InputCheckbox extends Input implements \IteratorAggregate, Contracts\InputCheckbox
{
    use Foundations\Check, Foundations\MultipleChoice;

    /**
     * type属性取得
     * 
     * @return void
     */
    public function getTypeAttribute(): string
    {
        return 'checkbox';
    }
}
