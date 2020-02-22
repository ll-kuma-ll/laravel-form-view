<?php

namespace LLkumaLL\FormView;

use LLkumaLL\FormView\Contracts\InputTime as ContractsInputTime;

/**
 * <input type="time">
 * 
 */
class InputTime extends InputText implements ContractsInputTime
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

        $this->type = 'time';
    }
}