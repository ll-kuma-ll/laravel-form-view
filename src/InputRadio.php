<?php

namespace LLkumaLL\FormView;

/**
 * ラジオボタン
 * 
 */
class InputRadio extends Input implements \IteratorAggregate, Contracts\InputRadio
{
    use Foundations\Check, Foundations\SingleChoice;
}
