<?php

namespace LLkumaLL\FormView;

/**
 * ラジオボタン
 * 
 */
class InputRadio extends Input implements \IteratorAggregate, Contracts\InputRadio
{
    use Foundations\Check, Foundations\SingleChoice;

    /**
     * type属性取得
     * 
     * @return string
     */
    public function getTypeAttribute(): string
    {
        return 'radio';
    }
}
