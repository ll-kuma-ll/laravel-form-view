<?php

namespace LLkumaLL\FormView;

/**
 * 隠し入力
 * 
 */
class InputHidden extends InputText implements Contracts\InputHidden
{
    /**
     * 初期化
     *
     * @param  string $name
     * @param  mixed  $value
     * @return void
     */
    public function setup(string $name = null, $default = null): void
    {
        parent::setup($name, $default);

        $this->type = 'hidden';
    }
}