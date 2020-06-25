@php
    /*
     |----------------------
     |    SELECTフォーム
     |----------------------
     | @param \LLkumaLL\FormView\Constants\Select $input
     | @param bool                                $useCustomSelect
     */
@endphp
<select class="{{ $input->use_custom_form || isset($useCustomForm) ? 'custom-select' : 'form-control' }} {{ $input->class }}@error($input->name) is-invalid @enderror" name="{{ $input->name }}" id="{{ $input->id }}">
    @foreach ($input as $val => $label)
        <option value="{{ $val }}"@if($input->isSelected($val)) selected @endif>{{ $label }}</option>
    @endforeach
</select>

