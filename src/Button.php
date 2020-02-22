<?php

namespace LLkumaLL\FormView;

use LLkumaLL\FormView\Contracts\Button as ContractsButton;

/**
 * buttonクラス
 * 
 */
class Button extends Base implements ContractsButton
{
    /**
     * type属性取得
     * -----
     * 設定がなければ初期値buttonを返す
     * 
     * @return string
     */
    public function getTypeAttribute(): string
    {
        return $this->getAttribute('type') ?: 'button';
    }

    /**
     * ID属性取得
     *
     * @return string
     */
    public function getIdAttribute(): string
    {
        return $this->getAttribute('id') ?: uniqid('button_');
    }
}
