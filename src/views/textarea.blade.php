@php
    /*
     |--------------------------
     |    複数行テキスト入力
     |--------------------------
     | @param \LLkumaLL\FormView\Contracts\Textarea $input
     */
@endphp
@include('form-view::label')
@component('form-view::components.input-group', ['input' => $input])
    <textarea class="form-control {{ $input->class }}@error($input->name) is-invalid @enderror" name="{{ $input->name }}" id="{{ $input->id }}">{{ $input->value }}</textarea>
    @include('form-view::includes.invalid-feedback')
@endcomponent
