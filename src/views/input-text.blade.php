@php
    /*
     |-----------------------
     |    1行テキスト入力
     |-----------------------
     | @param \LLkumaLL\FormView\Contracts\InputText $input
     */
@endphp
@include('form-view::label')

<div class="{{ $input->use_input_group ? 'input-group ' : '' }}{{ $input->class }} @if($input->holizontal) col-sm-{{ $input->horizontal }} @endif">
    @if ($input->use_input_group_prepend)
        <div class="input-group-prepend">
            @each('form-view::input-group', $input->input_group_prepends, 'input')
        </div>
    @endif

    <input type="{{ $input->type }}" class="form-control {{ $input->class }}@error($input->name) is-invalid @enderror" name="{{ $input->name }}" id="{{ $input->id }}" value="{{ $input->value }}" placeholder="{{ $input->placeholder }}" @if($input->requires) required @endif>

    @if ($input->use_input_group_append)
        <div class="input-group-append">
            @each('form-view::input-group', $input->input_group_appends, 'input')
        </div>
    @endif
</div>
