<?php

namespace LLkumaLL\FormView\Foundations;

/**
 * value属性機能
 * -----
 * モデルが渡されればname属性と同一名称のカラムから取得
 * 直前にユーザー入力が存在すればそちらを反映
 * 
 */
trait ValueByModelAndUser
{
    /**
     * value属性設定
     * 
     * @param  mixed $value
     * @return void
     */
    public function setValueAttribute($value = null): void
    {
        $name = $this->getAttribute('name');
        $this->setAttribute('value', old($name, is_object($value) ? $value->$name : $value));
    }
}