<?php

namespace LLkumaLL\FormView;

use LLkumaLL\FormView\Contracts\Input;

/**
 * フォーム
 * 
 */
class Form extends Base
{
    /**
     * 各入力項目インスタンス配列
     *
     * @var array
     */
    protected $fields = [];

    /**
     * 隠し項目インスタンス配列
     * 
     * @var array
     */
    protected $hiddens = [];

    /**
     * サブミットボタン水平方向設定
     * 
     * @var string
     */
    public $submitAlign = 'center';

    /**
     * 全入力項目設定
     *
     * @param  array $fields Baseインスタンス配列
     * @return void
     */
    public function setFieldsAttribute(array $fields): void
    {
        $this->fields = $fields;
    }

    /**
     * 入力項目追加
     * 
     * @param  mixed $fields
     * @return void
     */
    public function setAddFieldsAttribute($fileds): void
    {
        $this->fields[] = $fileds;
    }

    /**
     * 全入力項目取得
     *
     * @return array
     */
    public function getFieldsAttribute(): array
    {
        return $this->fields;
    }

    /**
     * 非表示項目設定
     * 
     * @param  array $inputs
     * @return void
     */
    public function setHiddensAttribute(array $inputs): void
    {
        $this->hiddens = $inputs;
    }

    /**
     * 非表示項目追加
     * 
     * @param  \LLkumaLL\FormView\Contracts\Input $input
     */
    public function setAddHiddenAttribute(Input $input): void
    {
        $this->hiddens[] = $input;
    }

    /**
     * 非表示項目取得
     * 
     * @return array
     */
    public function getHiddensAttribute(): array
    {
        return $this->hiddens;
    }

    /**
     * method属性取得
     *
     * @return string
     */
    public function getMethodAttribute(): string
    {
        return $this->getAttribute('method', 'POST');
    }

    /**
     * GET送信か判定
     *
     * @return bool
     */
    public function getIsGetMethodAttribute(): bool
    {
        return strcasecmp('GET', $this->method) == 0;
    }

    /**
     * methodフィールドが必要か判定
     *
     * @return bool
     */
    public function getNeedMethodFieldAttribute(): bool
    {
        return in_array(strtoupper($this->method), ['PUT', 'PATCH', 'DELETE']);
    }

    /**
     * enctype属性取得
     *
     * @return string
     */
    public function getEnctypeAttribute(): string
    {
        return $this->getAttribute('enctype', 'application/x-www-form-urlencoded');
    }
}
