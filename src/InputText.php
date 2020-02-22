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

    /**
     * プレースホルダー属性取得
     *
     * @return string
     */
    public function getPlaceholderAttribute(): string
    {
        $placeholder = $this->getAttribute('placeholder');
        if (empty($placeholder)) {
            if ($this->without_label) {
                return (string)$this->label;
            }

            if ($this->required) {
                return __('messages.require');
            }
        }

        return (string)$placeholder;
    }
}
