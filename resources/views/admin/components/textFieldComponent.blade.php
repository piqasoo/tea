<?php 
	$component 	= (object) $component;
	$label 		= isset($component->label) ? $component->label : 'label';
	$columnName = isset($component->columnName) ? $component->columnName : 'name';
	$placeholder = isset($component->placeholder) ? $component->placeholder : 'fill field';
	$helpText	= isset($component->helpText) ?	$component->helpText : '';
	$required 	= isset($component->required) ? true : false;
	$value = isset($data->$columnName) ? $data->$columnName : null;

	if((isset($lang) && $lang)){
		$value = isset($data->$columnName) ? $data->translate($lang)->$columnName : null;
		$columnName = $columnName.'['. $lang .']';	
	}	
?>
<div class="form-group {{ $errors->has($columnName) ? 'has-error' : '' }} col-md-12">
    <label class="col-md-2 control-label" for="example-text-input">{{ $label }}   @if($required)<span style="color:red">*</span>@endif</label>
    <div class="col-md-6">
      	{!! Form::text($columnName, $value, array('class'=>'form-control',  'placeholder' => $placeholder)) !!}
      	@if($helpText)<span class="help-block">{{ $helpText }}</span>@endif
      	@if($errors->has($columnName))<div class="help-block animation-slideDown">{{ $errors->first($columnName) }}</div>@endif
    </div>
</div>