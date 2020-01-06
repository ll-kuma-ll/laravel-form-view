<?php

namespace LLkumaLL\FormView\Foundations;

/**
 * チェックボックス・ラジオボタン機能
 *
 */
trait Check
{
    /**
     * インライン表示
     *
     * @var string
     */
    protected $inline = false;

    /**
     * インライン設定
     *
     * @param  bool $inline
     * @return void
     */
    public function setInlineAttribute(bool $inline): void
    {
        $this->inline = $inline;
    }
}
