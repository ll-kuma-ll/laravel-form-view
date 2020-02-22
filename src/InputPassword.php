<?php

namespace LLkumaLL\FormView;

use LLkumaLL\FormView\Contracts\InputPassword as ContractsInputPassword;

/**
 * パスワード入力
 *
 */
class InputPassword extends InputText implements ContractsInputPassword
{
    /**
     * 初期化
     *
     * @return void
     */
    public function setup(string $name = null, $default = null): void
    {
        parent::setup($name, $default);

        $this->type = 'password';
    }
}
