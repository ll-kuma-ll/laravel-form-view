<?php

namespace LLkumaLL\FormView;

/**
 * <input type="text">
 *
 */
class InputText extends Input implements Contracts\InputText
{
    use Foundations\InputGroup;

    /**
     * type属性取得
     *
     * @return string
     */
    public function getTypeAttribute(): string
    {
        return $this->getAttribute('type') ?: 'text';
    }
}
