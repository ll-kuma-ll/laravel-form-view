<?php

namespace LLkumaLL\FormView;

/**
 * <input type="date">
 * 
 */
class InputDate extends InputText implements Contracts\InputDate
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

        $this->type = 'date';
    }
}