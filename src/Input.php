<?php

namespace LLkumaLL\FormView;

/**
 * 入力系総合クラス
 *
 */
class Input extends Base implements Contracts\Input
{
    use Foundations\ValueByModelAndUser;

    /**
     * 初期化
     *
     * @return void
     */
    public function setup(string $name = null, $default = null): void
    {
        parent::setup($name, $default);

        $this->casts['required'] = 'bool';
    }

    /**
     * id属性取得
     *
     * @return string
     */
    public function getIdAttribute(): string
    {
        return $this->getAttribute('id', 'input_'.$this->getAttribute('name', uniqid()));
    }
}
