@php
    /*
     |-----------------------
     |    1行テキスト入力
     |-----------------------
     | @param \LLkumaLL\FormView\Contracts\InputText $input
     */
@endphp
@include('form-view::label')
@component('form-view::components.input-group', ['input' => $input])
    @include('form-view::includes.input-text')
@endcomponent
