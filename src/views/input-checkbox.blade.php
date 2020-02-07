@include('includes.forms.label')
<div>
    @foreach ($input as $value => $label)
        <div class="form-check {{ $input->inline ? 'form-check-inline' : '' }}">
            <input type="checkbox" class="form-check-input @error($input->name) is-invalid @enderror" name="{{ $input->name }}[]" value="{{ $value }}" id="{{ $input->id }}_{{ $loop->index }}" @if($input->isSelected($value)) checked @endif>
            <label class="form-check-label" for="{{ $input->id }}_{{ $loop->index }}">{{ $label }}</label>
        </div>
    @endforeach
</div>
