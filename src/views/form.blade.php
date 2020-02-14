@php
    /*
     |----------------------
     |    フォームビュー
     |----------------------
     | @param \LLkumaLL\FormView\Form $form
     */
@endphp
<form action="{{ $form->action }}" method="{{ $form->is_get_method ? 'GET' : 'POST' }}" enctype="{{ $form->enctype }}" class="{{ $form->class }}" id="{{ $form->id }}">
    @csrf
    @foreach ($form->hiddens as $input)
        <input type="hidden" name="{{ $input->name }}" value="{{ $input->value }}">
    @endforeach
    @if ($form->need_method_field) @method($form->method) @endif
    @each('form-view::form-group', $form->fields, 'input')
    {{ $slot }}
</form>
