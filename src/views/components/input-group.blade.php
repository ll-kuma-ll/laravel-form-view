@php
    /*
     |-----------------------------------
     |    input-group cコンポーネント
     |-----------------------------------
     | @param \LLkumaLL\FormView\Contracts\InputText|\LLkumaLL\FromView\Contracts\Textarea $input
     */
@endphp
<div class="{{ $input->use_input_group ? 'input-group ' : '' }}{{ $input->class }} @if($input->holizontal) col-sm-{{ $input->horizontal }} @endif">
    @if ($input->use_input_group_prepend)
        <div class="input-group-prepend">
            @each('form-view::includes.input-group', $input->input_group_prepends, 'input')
        </div>
    @endif

    {{ $slot }}

    @if ($input->use_input_group_append)
        <div class="input-group-append">
            @each('form-view::includes.input-group', $input->input_group_appends, 'input')
        </div>
    @endif
</div>