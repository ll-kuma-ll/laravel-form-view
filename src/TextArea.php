<?php

namespace LLkumaLL\FormView;

use LLkumaLL\FormView\Contracts\Textarea as ContractsTextarea;

/**
 * テキストエリア（複数行入力）
 * 
 */
class TextArea extends Input implements ContractsTextarea
{
    use Foundations\InputGroup;
}
