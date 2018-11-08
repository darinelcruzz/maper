<div id="field_{{ $id }}" {!! Html::classes(['form-group', 'has-error' => $hasErrors]) !!}>
	<label for="{{ $id }}"><b>{{ $label }}</b></label>
	@if ($required)
        <span class="label label-info">Required</span>
    @endif

    {!! $input !!}

    @foreach ($errors as $error)
        <p class="help-block">{{ $error }}</p>
    @endforeach
</div>