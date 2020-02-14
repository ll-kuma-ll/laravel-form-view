<?php

namespace Tests;

use LLkumaLL\FormView\{
    Input,
    InputCheckbox,
    InputRadio,
    InputText,
    TextArea
};
use LLkumaLL\FormView\Form;
use PHPUnit\Framework\TestCase;
use Mockery as M;

class FormTest extends TestCase
{
    /**
     * 項目設定テスト
     * 
     * @return void
     */
    public function testFields(): void
    {
        $sets = [
            M::spy(Input::class),
            [
                M::spy(InputCheckbox::class),
                M::spy(InputRadio::class),
            ],
        ];
        $ins = new Form();
        $ins->fields = $sets;
        $this->assertIsArray($ins->fields, '->setFieldsAttribute(), ->getFieldsAttribute()');
        $this->assertEquals($sets, $ins->fields, '->setFieldsAttribute(), ->getFieldsAttribute()');

        $sets[] = M::spy(TextArea::class);
        $ins->add_fields = $sets[2];
        $this->assertEquals($sets, $ins->fields, '->setAddFieldsAttribute(), ->getFieldsAttribute()');
    }

    /**
     * 非表示項目設定テスト
     * 
     * @return void
     */
    public function testHiddens(): void
    {
        $sets = [
            M::spy(InputText::class),
            M::spy(InputText::class),
        ];
        $ins = new Form();
        $ins->hiddens = $sets;
        $this->assertIsArray($ins->hiddens);
        $this->assertEquals($sets, $ins->hiddens);

        $sets[] = M::spy(Input::class);
        $ins->add_hidden = $sets[2];
        $this->assertEquals($sets, $ins->hiddens);
    }

    /**
     * method属性テスト
     * 
     * @return void
     */
    public function testMethod(): void
    {
        $ins = new Form();

        // POST
        $this->assertEquals('POST', $ins->method);
        $this->assertFalse($ins->is_get_method);
        $this->assertFalse($ins->need_method_field);

        // GET
        $ins->method = 'GET';
        $this->assertEquals('GET', $ins->method);
        $this->assertTrue($ins->is_get_method);
        $this->assertFalse($ins->need_method_field);

        // PUT
        $ins->method = 'PUT';
        $this->assertEquals('PUT', $ins->method);
        $this->assertFalse($ins->is_get_method);
        $this->assertTrue($ins->need_method_field);

        // PATCH
        $ins->method = 'PATCH';
        $this->assertEquals('PATCH', $ins->method);
        $this->assertFalse($ins->is_get_method);
        $this->assertTrue($ins->need_method_field);

        // DELETE
        $ins->method = 'DELETE';
        $this->assertEquals('DELETE', $ins->method);
        $this->assertFalse($ins->is_get_method);
        $this->assertTrue($ins->need_method_field);
    }

    /**
     * enctype属性テスト
     * 
     * @return void
     */
    public function testEnctype(): void
    {
        $ins = new Form();
        $this->assertEquals('application/x-www-form-urlencoded', $ins->enctype);

        $ins->enctype = 'multipart/form-data';
        $this->assertEquals('multipart/form-data', $ins->enctype);
    }
}