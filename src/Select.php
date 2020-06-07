<?php

namespace LLkumaLL\FormView;

/**
 * セレクト（プルダウン）
 * 
 */
class Select extends Input implements \IteratorAggregate, Contracts\Select
{
    use Foundations\SingleChoice, Foundations\InputGroup;
}