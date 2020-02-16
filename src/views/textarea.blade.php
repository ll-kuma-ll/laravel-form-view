@include('includes.forms.label')
<textarea class="form-control" name="{{ $input->name }}" id="{{ $input->id }}">{{ $input->value }}</textarea>
@includeWhen(!empty($input->text), 'view.name', ['some' => 'data'])
