<?php

namespace LLkumaLL\FormView;

/**
 * チェックボックス
 * 
 */
class InputCheckbox extends Input implements \IteratorAggregate, Contracts\InputCheckbox
{
    use Foundations\Check, Foundations\MultipleChoice;
}
