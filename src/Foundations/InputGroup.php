<?php

namespace LLkumaLL\FormView\Foundations;

use LLkumaLL\FormView\Contracts\InputText;

/**
 * input-group機能トレイト
 *
 */
trait InputGroup
{
    /**
     * 左側
     * 
     * @var array
     */
    protected $inputGroupPrepends = [];

    /**
     * 右側
     * 
     * @var array
     */
    protected $inputGroupAppends = [];

    /**
     * 複数入力
     * 
     * @var array
     */
    protected $inputGroupMultiples = [];

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
     * 複数入力設定
     * 
     * @param  mixed $inputs
     * @return void
     */
    public function setInputGroupMultiplesAttribute($inputs): void
    {
        $this->inputGroupMultiples = is_array($inputs) ? $inputs : [$inputs];
    }

    /**
     * 複数入力取得
     * 
     * @return array
     */
    public function getInputGroupMultiplesAttribute(): array
    {
        return $this->inputGroupMultiples;
    }

    /**
     * 複数入力追加
     * 
     * @param  \LLkumaLL\FormView\Contracts\InputText $input
     * @return self
     */
    public function addInputGroupMultiple(InputText $input): self
    {
        $this->inputGroupMultiples[] = $input;

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
