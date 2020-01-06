<?php

namespace LLkumaLL\FormView\Foundations;

/**
 * 入力項目名称表示機能
 * 
 */
trait FieldLabel
{
    /**
     * 入力項目表示名称
     * 
     * @var string
     */
    protected $fieldLabel;

    /**
     * 入力項目名称表示フラグ
     * 
     * @var bool
     */
    protected $viewFieldLabel = true;

    /**
     * 入力項目表示名称設定
     * 
     * @param  string $label
     * @return void
     */
    public function setFieldLabelAttribute(string $label): void
    {
        $this->fieldLabel = $label;
    }

    /**
     * 入力項目表示名称取得
     * 
     * @return string
     */
    public function getFieldLabelAttribute(): string
    {
        return $this->fieldLabel;
    }

    /**
     * 入力項目名称表示フラグ設定
     * 
     * @param  bool $view
     * @return void
     */
    public function setViewFieldLabelAttribute(bool $view): void
    {
        $this->viewFieldLabel = $view;
    }

    /**
     * 入力項目名称表示フラグ取得
     * 
     * @return bool
     */
    public function getViewFieldLabelAttribute(): bool
    {
        return $this->viewFieldLabel;
    }
}