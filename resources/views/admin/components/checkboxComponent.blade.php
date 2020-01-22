<?php
	
	$component 	= (object) $component;
	$label 		= isset($component->label) ? $component->label : 'label';
	$columnName = isset($component->columnName) ? $component->columnName : 'date';
	$errorColumn = isset($component->columnName) ? $component->columnName : 'date';
	$helpText	= isset($component->helpText) ?	$component->helpText : '';
	$required 	= isset($component->required) ? true : false;
	$value = isset($data->$columnName) ? $data->$columnName : 0;
?>
<div class="form-group {{ $errors->has($errorColumn) ? 'has-error' : '' }} col-md-12">
	<label class="col-md-3 control-label switch switch-warning">{{ ucfirst($label) }}
		<input type="checkbox" value="1" id="visibility" name="{{$columnName}}" {!! $value ? 'checked' : '' !!} ><span></span>
	</label>
	@if($helpText)<span class="">{{ $helpText }}</span>@endif
    @if($errors->has($errorColumn))<div class="help-block animation-slideDown">{{ $errors->first($errorColumn) }}</div>@endif
</div>
