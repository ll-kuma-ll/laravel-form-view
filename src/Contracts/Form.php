<?php

namespace LLkumaLL\FormView\Contracts;

/**
 * Form機能インタフェース
 * 
 */
interface Form extends Base
{
    /**
     * GET送信か判定
     *
     * @return bool
     */
    public function getIsGetMethodAttribute(): bool;

    /**
     * methodフィールドが必要か判定
     *
     * @return bool
     */
    public function getNeedMethodFieldAttribute(): bool;
}