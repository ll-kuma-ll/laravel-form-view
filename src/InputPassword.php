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
     * type属性固定化
     * 
     * @var text
     */
    protected $type = 'password';
}
