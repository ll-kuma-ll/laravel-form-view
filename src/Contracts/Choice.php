<?php

namespace LLkumaLL\FormView\Contracts;

/**
 * 選択機能インタフェース
 * 
 */
interface Choice extends \Traversable
{
    /**
     * 選択済み項目か判定
     *
     * @param  mixed $value
     * @return bool
     */
    public function isSelected($value): bool;

    /**
     * 選択項目設定
     *
     * @param  array $list
     * @return void
     */
    public function setSelectListAttribute(array $list): void;

    /**
     * 選択項目追加
     *
     * @param  string $value
     * @param  string $label
     * @return self
     */
    public function addSelectList(string $value, string $label);

    /**
     * 選択項目取得
     * 
     * @return array
     */
    public function getSelectListAttribute(): array;
}