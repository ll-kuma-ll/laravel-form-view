<?php

namespace LLkumaLL\FormView;

use LLkumaLL\FormView\Contracts\InputDateTime as ContractsInputDateTime;

/**
 * <input type="datetime-local">
 * 
 */
class InputDateTime extends InputText implements ContractsInputDateTime
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

        $this->type = 'datetime-local';
    }
}
