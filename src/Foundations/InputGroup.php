<?php

namespace LLkumaLL\FormView\Foundations;

/**
 * input-group機能トレイト
 *
 */
trait InputGroup
{
    protected $inputGroupPrepends = [];
    protected $inputGroupAppends = [];

    /**
     * 入力フォーム左側にパーツ設定
     * 
     * @param  mixed
     * @return void
     */
    public function setInputGroupPrependsAttribute($inputGroups): void
    {
        $this->inputGroupPrepends = is_array($inputGroups) ? $inputGroups : [$inputGroups];
    }

    /**
     * 入力フォーム左側パーツ取得
     * 
     * @return array
     */
    public function getInputGroupPrependsAttribute(): array
    {
        return $this->inputGroupPrepends;
    }

    /**
     * 入力フォーム左側にパーツ追加
     *
     * @param  mixed $inputGroup stringまたは\LLkumaLL\FormView\Button
     * @return self
     */
    public function addInputGroupPrepend($inputGroup): self
    {
        $this->inputGroupPrepends[] = $inputGroup;

        return $this;
    }

    /**
     * 入力フォーム右側にパーツ設定
     * 
     * @param  mixed $inputGroups
     * @return void
     */
    public function setInputGroupAppendsAttribute($inputGroups): void
    {
        $this->inputGroupAppends = is_array($inputGroups) ? $inputGroups : [$inputGroups];
    }

    /**
     * 入力フォーム右側パーツ取得
     * 
     * @return array
     */
    public function getInputGroupAppendsAttribute(): array
    {
        return $this->inputGroupAppends;
    }

    /**
     * 入力フォーム右側にパーツ追加
     *
     * @param  mixed $inputGroup stringまたは\LLkumaLL\FormView\Button
     * @return self
     */
    public function addInputGroupAppend($inputGroup): self
    {
        $this->inputGroupAppends[] = $inputGroup;

        return $this;
    }

    /**
     * 入力フォームに追加パーツを利用するか判定
     * -----
     * $instance->use_input_group で参照
     *
     * @return bool
     */
    public function getUseInputGroupAttribute(): bool
    {
        return $this->getUseInputGroupPrependAttribute() || $this->getUseInputGroupAppendAttribute();
    }

    /**
     * 入力フォーム左側に追加パーツを利用するか判定
     * -----
     * $instance->use_input_group_prepend で参照
     *
     * @return bool
     */
    public function getUseInputGroupPrependAttribute(): bool
    {
        return !empty($this->inputGroupPrepends);
    }

    /**
     * 入力フォーム右側に追加パーツを利用するか判定 
     * -----
     * $instance->use_input_group_append で参照
     *
     * @return bool
     */
    public function getUseInputGroupAppendAttribute(): bool
    {
        return !empty($this->inputGroupAppends);
    }
}
