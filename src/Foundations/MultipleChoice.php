<?php

namespace LLkumaLL\FormView\Foundations;

/**
 * 複数選択機能トレイト
 *
 */
trait MultipleChoice
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
        $selecteds = $this->getAttribute('value');

        return is_array($selecteds) && in_array($value, $selecteds);
    }
}
