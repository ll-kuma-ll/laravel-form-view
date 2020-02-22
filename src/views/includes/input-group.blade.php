@php
    /*
     |-------------------------
     |    input-groupパーツ
     |-------------------------
     | @param string|\LLkumaLL\FormView\Button $input
     */
    use LLkumaLL\FormView\Contracts\{
        Button,
        Input
    };
@endphp
@if ($input instanceof Button)
    <button type="{{ $input->type }}" class="{{ $input->class ?: 'btn btn-outline-secondary'}}" id="{{ $input->id }}" onclick="{!! $input->on_click !!}">{{ $input->label }}</button>
@elseif ($input instanceof Input)
    <input type="{{ $input->type }}" name="{{ $input->name }}" value="{{ $input->value }}" aria-label="{{ $input->aria_label }}">
@else
    <span class="input-group-text">{{ $input }}</span>
@endif
