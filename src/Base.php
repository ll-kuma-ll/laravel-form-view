<?php

namespace LLkumaLL\FormView;

use Illuminate\Support\Str;

/**
 * 基底クラス
 *
 */
abstract class Base
{
    /**
     * 属性データ
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * キャスト
     *
     * @var array
     */
    protected $casts = [];

    /**
     * コンストラクター
     *
     */
    public function __construct()
    {
        $this->setup();
    }

    /**
     * 属性初期化
     *
     * @return void
     */
    protected function setup(): void
    {
        $this->attributes['class'] = [];
        $this->attributes['disabled'] = false;

        $this->casts['class'] = 'array';
        $this->casts['disabled'] = 'bool';
    }

    /**
     * クラス属性追加
     *
     * @param  string
     * @return self
     */
    public function addClass(string $class): self
    {
        $this->attributes['class'][] = $class;

        return $this;
    }

    /**
     * クラス属性取得
     *
     * @return string
     */
    public function getClassAttribute(): string
    {
        return implode(' ', $this->attributes['class']);
    }

    /**
     * 属性取得
     *
     * @param  string $name
     * @param  mixed  $default
     * @return mixed
     */
    public function getAttribute(string $name, $default = null)
    {
        return $this->attributes[Str::snake($name)] ?? $default;
    }

    /**
     * 属性設定
     *
     * @param  string $name  属性名
     * @param  mixed  $value 属性値
     * @return void
     */
    public function setAttribute(string $name, $value): void
    {
        $name = Str::snake($name);

        if (!empty($value) && isset($this->casts[$name])) {
            switch ($this->casts[$name]) {
                case 'bool':
                    $value = (bool)$value;
                break;
                case 'string':
                    $value = (string)$value;
                break;
                case 'array':
                    $value = is_array($value) ? $value : [$value];
                break;
            }
        }

        $this->attributes[$name] = $value;
    }

    /**
     * 属性値追記
     *
     * @param  string $name  属性名
     * @param  mixed  $value 追加値
     * @return void
     */
    public function pushAttribute(string $name, $value): void
    {
        $name = Str::snake($name);

        if (!isset($this->attributes[$name])) {
            $this->setAttribute($name, $value);
            return;
        }

        if (array_key_exists($name, $this->casts)) {
            // Booleanは処理しない
            if ($this->casts[$name] == 'bool') {
                return;
            }

            if ($this->casts[$name] == 'array') {
                $this->attributes[$name][] = $value;
                return;
            }
        }

        $this->attributes[$name] .= $value;
    }

    /**
     * ミューテタメソッド呼び出し
     *
     * @param  string $name      プロパティ名
     * @param  array  $arguments 引数
     * @return bool              実行判定
     */
    private function callSetMethod(string $name, array $arguments): bool
    {
        $method = 'set' . Str::studly($name) . 'Attribute';

        if (method_exists($this, $method)) {
            call_user_func_array([$this, $method], $arguments);

            return true;
        }

        return false;
    }

    /**
     * 属性追記
     * 
     * @param  string $name
     */

    /**
     * プロパティ参照
     *
     * @param  string $namme
     * @return mixed
     */
    public function __get($name)
    {
        $method = 'get' . Str::studly($name) . 'Attribute';

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        return $this->getAttribute($name);
    }

    /**
     * プロパティ設定
     *
     * @param  string $name
     * @param  mixed  $value
     * @return void
     */
    public function __set($name, $value)
    {
        $this->callSetMethod($name, [$value]) || $this->setAttribute($name, $value);
    }

    /**
     * メソッド呼び出し
     *
     * @param  string $name
     * @param  array  $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if ($this->callSetMethod($name, $arguments)) {
            return $this;
        }

        $this->setAttribute($name, $arguments[0] ?? null);

        return $this;

    }
}
