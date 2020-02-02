<?php

namespace LLkumaLL\FormView\Contracts;

/**
 * 基本機能インタフェース
 * 
 */
interface Base
{
    /**
     * コンストラクター
     *
     * @param string $name  name属性
     * @param mixed  $value value属性
     */
    public function __construct(string $name = null, $default = null);

    /**
     * 属性取得
     *
     * @param  string $name
     * @param  mixed  $default
     * @return mixed
     */
    public function getAttribute(string $name, $default = null);

    /**
     * 属性設定
     *
     * @param  string $name  属性名
     * @param  mixed  $value 属性値
     * @return void
     */
    public function setAttribute(string $name, $value): void;

    /**
     * プロパティ参照
     *
     * @param  string $namme
     * @return mixed
     */
    public function __get($name);

    /**
     * 属性値設定
     *
     * @param  string $name
     * @param  mixed  $value
     * @return void
     */
    public function __set($name, $value);

    /**
     * メソッド呼び出し
     *
     * @param  string $name
     * @param  array  $arguments
     * @return mixed
     */
    public function __call($name, $arguments);
}