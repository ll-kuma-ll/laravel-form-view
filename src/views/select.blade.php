@php
    /*
     |----------------------
     |    SELECTフォーム
     |----------------------
     | @param \LLkumaLL\FormView\Contracts\Select
     */
@endphp
@include('form-view::label')
@component('form-view::components.input-group', ['input' => $input])
    @include('form-view::includes.select')
    @include('form-view::includes.invalid-feedback')
@endcomponent
