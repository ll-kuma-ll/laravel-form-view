<?php

namespace LLkumaLL\FormView;

use Illuminate\Support\ServiceProvider;
use LLkumaLL\FormView\Contracts\{
    Form as ContractForm,
    Input as ContractInput,
    InputCheckbox as ContractInputCheckbox,
    InputDate as ContractInputDate,
    InputHidden as ContractInputHidden,
    InputPassword as ContractInputPassword,
    InputRadio as ContractInputRadio,
    InputText as ContractInputText,
    Select as ContractSelect,
    SelectMultiple as ContractSelectMultiple,
    Textarea as ContractTextarea
};

/**
 * サービスプロバイダー
 * 
 */
class FormViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ContractForm::class, Form::class);
        $this->app->bind(ContractInput::class, Input::class);
        $this->app->bind(ContractInputCheckbox::class, InputCheckbox::class);
        $this->app->bind(ContractInputDate::class, InputDate::class);
        $this->app->bind(ContractInputHidden::class, InputHidden::class);
        $this->app->bind(ContractInputPassword::class, InputPassword::class);
        $this->app->bind(ContractInputRadio::class, InputRadio::class);
        $this->app->bind(ContractInputText::class, InputText::class);
        $this->app->bind(ContractTextarea::class, Textarea::class);
        $this->app->bind(ContractSelect::class, Select::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'form-view');
    }
}
