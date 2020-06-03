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
     * ユニークキー
     * 
     * @var string
     */
    protected $uniqId = '';

    /**
     * GRID col指定値
     *
     * @var int
     */
    protected $col = null;

    /**
     * 初期化
     *
     * @return void
     */
    public function setup(string $name = null, $default = null): void
    {
        parent::setup($name, $default);

        $this->casts['required'] = 'bool';
        $this->uniqId = uniqid();
    }

    /**
     * id属性取得
     *
     * @return string
     */
    public function getIdAttribute(): string
    {
        return $this->getAttribute('id', 'input_'.$this->getAttribute('name', $this->uniqId));
    }

    /**
     * col値設定
     *
     * @param  int $col
     * @return void
     */
    public function setColAttribute(int $col): void
    {
        $this->col = $col;
    }

    /**
     * col設定
     *
     * @return int
     */
    public function getColAttribute(): ?int
    {
        return $this->col;
    }
}
