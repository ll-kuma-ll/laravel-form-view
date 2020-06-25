@php
    /*
     |------------------------
     |    一行テキスト入力
     |------------------------
     */
@endphp
<input type="{{ $input->type }}" class="form-control {{ $input->class }}@error($input->name) is-invalid @enderror" name="{{ $input->name }}" id="{{ $input->id }}" value="{{ $input->value }}" placeholder="{{ $input->placeholder }}" @if($input->required) required @endif>

