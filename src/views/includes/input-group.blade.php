@php
    /*
     |-------------------------
     |    input-groupパーツ
     |-------------------------
     | @param string|\LLkumaLL\FormView\Button $input
     */
    use LLkumaLL\FormView\Contracts\{
        Button,
        Input,
        Select
    };
@endphp
@if ($input instanceof Button)
    <button type="{{ $input->type }}" class="{{ $input->class ?: 'btn btn-outline-secondary'}}" id="{{ $input->id }}" onclick="{!! $input->on_click !!}">{{ $input->label }}</button>
@elseif ($input instanceof Select)
    @include('form-view::includes.select', ['useCustomForm' => true])
@elseif ($input instanceof Input)
    @include('form-view::includes.input-text')
@else
    <span class="input-group-text">{{ $input }}</span>
@endif
