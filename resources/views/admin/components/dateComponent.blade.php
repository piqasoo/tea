<?php
	
	$component 	= (object) $component;
	$format = isset($component->format) ? $component->format : 'yyyy-m-d';
	$label 		= isset($component->label) ? $component->label : 'label';
	$columnName = isset($component->columnName) ? $component->columnName : 'date';
	$errorColumn = isset($component->columnName) ? $component->columnName : 'date';
	$placeholder = isset($component->placeholder) ? $component->placeholder : \Carbon\carbon::now()->format('Y-m-d');
	$helpText	= isset($component->helpText) ?	$component->helpText : '';
	$required 	= isset($component->required) ? true : false;
	$value = isset($data->$columnName) ? $data->$columnName : \Carbon\carbon::now()->format('Y-m-d');
?>
<div class="form-group {{ $errors->has($errorColumn) ? 'has-error' : '' }} col-md-12">
	<label class="col-md-2 control-label" for="example-text-input">{{ ucfirst($label) }}</label>
    <div class="col-md-4">
        <input type="text" value="{{ $value }}" id="example-datepicker3" name="{{ $columnName }}" class="form-control input-datepicker" data-date-format="{{ $format }}" placeholder="{{ $placeholder }}">
        @if($helpText)<span class="">{{ $helpText }}</span>@endif
      	@if($errors->has($errorColumn))<div class="help-block animation-slideDown">{{ $errors->first($errorColumn) }}</div>@endif
    </div>

</div>
