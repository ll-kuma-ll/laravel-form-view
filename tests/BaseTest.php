<?php

namespace LLkumaLL\FormView\Tests;

use LLkumaLL\FormView\Base;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    /**
     * コンストラクタテスト
     * 
     * @return void
     */
    public function testConstruct(): void
    {
        $ins = new class('test name', 'test value') extends Base {};
        $attributes = new \ReflectionProperty($ins, 'attributes');
        $attributes->setAccessible(true);
        $assert = $attributes->getValue($ins);

        $this->assertArrayHasKey('name', $assert);
        $this->assertEquals('test name', $assert['name']);
        $this->assertArrayHasKey('value', $assert);
        $this->assertEquals('test value', $assert['value']);
    }

    /**
     * 初期化処理テスト
     * -----
     * コンストラクタから呼ばれ、プロパティの初期化処理が実行されるか検証
     * 
     * @return void
     */
    public function testSetup(): void
    {
        $attribbutes = new \ReflectionProperty(Base::class, 'attributes');
        $attribbutes->setAccessible(true);
        $casts = new \ReflectionProperty(Base::class, 'casts');
        $casts->setAccessible(true);
        $mock = $this->getMockForAbstractClass(Base::class);

        // attributesプロパティ生成検証
        $expected = [
            'class' => [],
            'disabled' => false,
            'name' => null,
            'value' => null,
        ];
        $actual = $attribbutes->getValue($mock);
        $this->assertEquals($expected, $actual);

        // castsプロパティ生成検証
        $expected = [
            'class' => 'array',
            'disabled' => 'bool',
        ];
        $actual = $casts->getValue($mock);
        $this->assertEquals($expected, $actual);

        // 引数あり
        $expected['name'] = 'test name';
        $expected['value'] = 'default value';
        $mock->setup('test name', 'default value');
        $actual = $attribbutes->getValue($mock);
    }

    /**
     * 属性設定テスト
     * 
     * @return void
     * @depends testSetup
     */
    public function testSetAttribute(): void
    {
        $prop = new \ReflectionProperty(Base::class, 'attributes');
        $prop->setAccessible(true);
        $mock = $this->getMockForAbstractClass(Base::class);

        // キー追加書き込み
        $expected = [
            'class' => [],
            'disabled' => false,
            'name' => null,
            'value' => null,
            'test_key' => 'sample'
        ];
        $mock->setAttribute('testKey', $expected['test_key']);
        $actual = $prop->getValue($mock);
        $this->assertArrayHasKey('test_key', $actual);
        $this->assertEquals($expected, $actual);

        // 既存キー更新
        $mock->setAttribute('testKey', 'update');
        $actual = $prop->getValue($mock);
        $this->assertEquals('update', $actual['test_key']);

        // 型変換
        $mock->setAttribute('disabled', 1);
        $actual = $prop->getValue($mock);
        $this->assertTrue($actual['disabled']);
    }

    /**
     * 属性追記テスト
     * 
     * @return void
     * @depends testSetAttribute
     */
    public function testPushAttribute(): void
    {
        $mock = new class extends Base {
            public function setup(string $name = null, $default = null): void
            {
                parent::setup();
                $this->casts['test_string'] = 'string';
                $this->casts['test_array'] = 'array';
                $this->casts['test_bool'] = 'bool';
            }
        };
        $attributes = new \ReflectionProperty(Base::class, 'attributes');
        $attributes->setAccessible(true);

        // bool既存値なし
        $mock->pushAttribute('test_bool', true);
        $actual = $attributes->getValue($mock)['test_bool'];
        $this->assertTrue($actual);

        // bool既存値あり
        $mock->pushAttribute('test_bool', false);
        $actual = $attributes->getValue($mock)['test_bool'];
        $this->assertTrue($actual, 'bool型は追記されない');

        // 配列型既存値なし
        $mock->pushAttribute('test_array', 'first');
        $actual = $attributes->getValue($mock)['test_array'];
        $this->assertEquals(['first'], $actual);

        // 配列型既存値あり
        $mock->pushAttribute('test_array', 'second');
        $actual = $attributes->getValue($mock)['test_array'];
        $this->assertEquals(['first','second'], $actual);

        // 文字列既存値なし
        $mock->pushAttribute('test_string', 'first');
        $actual = $attributes->getValue($mock)['test_string'];
        $this->assertEquals('first', $actual);

        // 文字列既存値あり
        $mock->pushAttribute('test_string', 'second');
        $actual = $attributes->getValue($mock)['test_string'];
        $this->assertEquals('firstsecond', $actual);
    }

    /**
     * 属性取得テスト
     * 
     * @return void
     * @depends testSetAttribute
     */
    public function testGetAttribute(): void
    {
        $mock = $this->getMockForAbstractClass(Base::class);

        // setAttributeで設定した内容取得
        $mock->setAttribute('test', 'sample');
        $this->assertEquals('sample', $mock->getAttribute('test'));
        $this->assertEquals('sample', $mock->getAttribute('test', 'default'));

        // 存在しないキー第二引数なし
        $this->assertNull($mock->getAttribute('nokey'), 'no exist key');

        // 存在しないキー第二引数あり
        $this->assertEquals('default', $mock->getAttribute('nokey', 'default'), 'no exist key with default');
    }

    /**
     * ミューテタテスト
     * 
     * @return void
     * @depends testSetAttribute
     */
    public function testSetter(): void
    {
        $attribbutes = new \ReflectionProperty(Base::class, 'attributes');
        $attribbutes->setAccessible(true);
        $mock = new class extends Base {
            public function setCustomMethodAttribute($value)
            {
                // 通常の処理が走らずにここだけ呼ばれる検証でキーを変えて登録する
                $this->setAttribute('custom_key', $value.' exec custom method');
            }
        };

        $expected = [
            'class' => [],
            'disabled' => false,
            'name' => null,
            'value' => null,
            'test_attr' => 'Test set attribute',
        ];
        $mock->test_attr = $expected['test_attr'];
        $actual = $attribbutes->getValue($mock);
        $this->assertArrayHasKey('test_attr', $actual);
        $this->assertEquals($expected, $actual);

        // キャメルケース
        $expected['test_attr'] = 'CamelCase to snake_case';
        $mock->testAttr = $expected['test_attr'];
        $actual = $attribbutes->getValue($mock);
        $this->assertEquals($expected, $actual);

        // 個別処理メソッド実装対象
        $expected['custom_key'] = 'aa exec custom method';
        $mock->custom_method = 'aa';
        $actual = $attribbutes->getValue($mock);
        $this->assertEquals($expected, $actual);
    }

    /**
     * アクセサテスト
     * 
     * @return void
     * @depends testGetAttribute
     */
    public function testGetter(): void
    {
        $mock = new class extends Base {
            public function setup(string $name = null, $default = null): void
            {
                parent::setup($name, $default);
                $this->attributes['test_attr'] = 'test attribute data';
            }
            public function getCustomMethodAttribute()
            {
                return 'exec custom method';
            }
        };
        $this->assertEquals('test attribute data', $mock->test_attr);
        $this->assertEquals('test attribute data', $mock->testAttr, 'CamelCase to snake_case');
        $this->assertEquals('exec custom method', $mock->custom_method);
        $this->assertEquals('exec custom method', $mock->customMethod, 'call CamelCase to snake_case');
    }

    /**
     * メソッド呼び出しテスト
     * 
     * @return void
     * @depends testSetAttribute
     */
    public function testCall(): void
    {
        $mock = new class extends Base {
            public function setCustomMethodAttribute($value)
            {
                $this->attributes['custom'] = $value;
            }
        };
        $attribbutes = new \ReflectionProperty(Base::class, 'attributes');
        $attribbutes->setAccessible(true);

        // ミューテタ呼び出し
        $expected = 'from setAttribute';
        $actual = $mock->fooBar($expected);
        $prop = $attribbutes->getValue($mock);
        $this->assertInstanceOf(Base::class, $actual);
        $this->assertArrayHasKey('foo_bar', $prop);
        $this->assertEquals($expected, $prop['foo_bar']);

        // カスタムメソッド呼び出し
        $expected = 'call custom method';
        $actual = $mock->customMethod($expected);
        $prop = $attribbutes->getValue($mock);
        $this->assertInstanceOf(Base::class, $actual);
        $this->assertArrayHasKey('custom', $prop);
        $this->assertEquals($expected, $prop['custom']);
    }
}