<?php

namespace LLkumaLL\FormView;

/**
 * <input type="date">
 * 
 */
class InputDate extends InputText implements Contracts\InputDate
{
    /**
     * type属性
     * 
     * @var string
     */
    protected $type = 'date';
}