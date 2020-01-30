<?php

namespace LLkumaLL\FormView;

/**
 * 隠し入力
 * 
 */
class InputHidden extends InputText implements Contracts\InputHidden
{
    /**
     * type属性固定化
     * 
     * @var string
     */
    protected $type = 'hidden';
}