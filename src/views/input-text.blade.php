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
    <input type="{{ $input->type }}" class="form-control {{ $input->class }}@error($input->name) is-invalid @enderror" name="{{ $input->name }}" id="{{ $input->id }}" value="{{ $input->value }}" placeholder="{{ $input->placeholder }}" @if($input->required) required @endif>
@endcomponent
