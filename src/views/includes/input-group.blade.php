@php
    /*
     |-------------------------
     |    input-groupパーツ
     |-------------------------
     | @param string|\LLkumaLL\FormView\Button $input
     */
    use App\Libs\Forms\Button;
@endphp
@if ($input instanceof Button)
    <button type="{{ $input->type }}" class="{{ $input->class ?: 'btn btn-outline-secondary'}}" id="{{ $input->id }}" onclick="{!! $input->on_click !!}">{{ $input->label }}</button>
@else
    <span class="input-group-text">{{ $input }}</span>
@endif
