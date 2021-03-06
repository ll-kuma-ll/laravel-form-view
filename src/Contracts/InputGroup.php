<?php

namespace LLkumaLL\FormView\Contracts;

/**
 * 左右にパーツを追加する機能インタフェース
 * 
 */
interface InputGroup
{
    /**
     * 入力フォーム左側にパーツ設定
     * 
     * @param  mixed
     * @return void
     */
    public function setInputGroupPrependsAttribute($inputGroups): void;

    /**
     * 入力フォーム左側にパーツ追加
     *
     * @param  mixed $inputGroup
     * @return self
     */
    public function addInputGroupPrepend($inputGroup);

    /**
     * 入力フォーム右側にパーツ設定
     * 
     * @param  mixed $inputGroups
     * @return void
     */
    public function setInputGroupAppendsAttribute($inputGroups): void;

    /**
     * 入力フォーム右側にパーツ追加
     *
     * @param  mixed $inputGroup
     * @return self
     */
    public function addInputGroupAppend($inputGroup);

    /**
     * 複数入力設定
     * 
     * @param  mixed $inputs
     * @return void
     */
    public function setInputGroupMultiplesAttribute($inputs): void;

    /**
     * 複数入力取得
     * 
     * @return array
     */
    public function getInputGroupMultiplesAttribute(): array;

    /**
     * 複数入力追加
     * 
     * @param  \LLkumaLL\FormView\InputText $input
     * @return self
     */
    public function addInputGroupMultiple(InputText $input);

    /**
     * 入力フォームに追加パーツを利用するか判定
     *
     * @return bool
     */
    public function getUseInputGroupAttribute(): bool;

    /**
     * 入力フォーム左側に追加パーツを利用するか判定
     *
     * @return bool
     */
    public function getUseInputGroupPrependAttribute(): bool;

    /**
     * 入力フォーム右側に追加パーツを利用するか判定
     *
     * @return bool
     */
    public function getUseInputGroupAppendAttribute(): bool;
}
