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
    <select class="{{ $input->use_input_group ? 'custom-select' : 'form-control' }} {{ $input->class }}@error($input->name) is-invalid @enderror" name="{{ $input->name }}" id="{{ $input->id }}">
        @foreach ($input as $val => $label)
            <option value="{{ $val }}"@if($input->isSelected($val)) selected @endif>{{ $label }}</option>
        @endforeach
    </select>
@endcomponent