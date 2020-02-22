@php
    /*
     |-------------------------------------------------
     |    入力項目名表示
     |-------------------------------------------------
     | @param \LLkunaLL\FormView\Contracts\Base $input
     */
@endphp
@if ($input->label && !$input->without_label)
    <label for="{{ $input->id }}" class="@if($input->horizontal) col-sm-{{ 12 - $input->horizontal }} @endif">
        {{ $input->label }}
        @if ($input->required)
            <span class="badge badge-warning">{{ __('form-view::required') }}</span>
        @endif
    </label>
@endif
