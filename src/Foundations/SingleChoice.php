<?php

namespace LLkumaLL\FormView\Foundations;

/**
 * 単一選択機能トレイト
 *
 */
trait SingleChoice
{
    use Choice;

    /**
     * 選択済み項目か判定
     *
     * @param  mixed $value
     * @return bool
     */
    public function isSelected($value): bool
    {
        return $this->getAttribute('value') == $value;
    }
}
