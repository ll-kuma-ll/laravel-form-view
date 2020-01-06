<?php

namespace LLkumaLL\FormView\Foundations;

/**
 * 選択操作機能トレイト
 *
 */
trait Choice
{
    /**
     * 選択項目一覧
     * 
     * @var array
     */
    protected $selectList = [];

    /**
     * 選択項目設定
     *
     * @param  array $list
     * @return void
     */
    public function setSelectListAttribute(array $list): void
    {
        $this->selectList = $list;
    }

    /**
     * 選択項目追加
     *
     * @param  string $value
     * @param  string $label
     * @return self
     */
    public function addSelectList(string $value, string $label): self
    {
        $this->selectList[$value] = $label;

        return $this;
    }

    /**
     * 選択項目取得
     * 
     * @return array
     */
    public function getSelectListAttribute(): array
    {
        return $this->selectList;
    }

    /**
     * イテレーター
     *
     * @return array
     */
    public function getIterator()
    {
        return collect($this->selectList);
    }
}
