<?php

namespace LLkumaLL\FormView;

use LLkumaLL\FormView\Contracts\Textarea as ContractsTextarea;

/**
 * テキストエリア（複数行入力）
 * 
 */
class Textarea extends Input implements ContractsTextarea
{
    use Foundations\InputGroup;
}
