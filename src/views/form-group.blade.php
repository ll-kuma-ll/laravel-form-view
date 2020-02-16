@php
    /*
     |---------------------------------------------
     |    入力フォーム form-group・form-row単位
     |---------------------------------------------
     | @param array|\LLkumaLL\FormView\Contracts\Base $input
     */
    use LLkumaLL\FormView\Contracts\{
        InputCheckbox,
        InputRadio,
        InputText,
        Select,
        SelectMultiple,
        TextArea
    };
@endphp
@if (is_array($input))
    <div class="form-row">
        @foreach ($input as $item)
            @include('form-view::form-group', ['input' => $item, 'col' => floor(12 / count($input))])
        @endforeach
    </div>
@elseif ($input instanceof InputText && $input->type == 'hidden')
    <input type="hidden" name="{{ $input->name }}" value="{{ $input->value }}">
@else
    <div class="form-group @isset($col) col-12 col-md-{{ $col }} @endisset @if($input->horizontal) row @endif">
        @includeWhen($input instanceof InputText, 'form-view::input-text')
        @includeWhen($input instanceof TextArea, 'form-view::textarea')
        @includeWhen($input instanceof InputRadio, 'form-view::input-radio')
        @includeWhen($input instanceof InputCheckbox, 'form-view::input-checkbox')
        @includeWhen($input instanceof Select || $input instanceof SelectMultiple, 'form-view::select')

        @error ($input->name)
            <div class="invalid-feedback">{{ $error }}</div>
        @enderror
        @if (!empty($input->comment))
            <small class="form-text text-muted">{{ $input->comment }}</small>
        @endif
    </div>
@endif
