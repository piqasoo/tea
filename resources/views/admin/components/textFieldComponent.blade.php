<?php 
	$component 	= (object) $component;
	$label 		= isset($component->label) ? $component->label : 'label';
	$columnName = isset($component->columnName) ? $component->columnName : 'name';
	$placeholder = isset($component->placeholder) ? $component->placeholder : 'fill field';
	$helpText	= isset($component->helpText) ?	$component->helpText : '';
	$required 	= isset($component->required) ? true : false;
	$value 		= isset($data->$columnName) ? $data->$columnName : null;
?>
<div class="form-group col-md-12">
    <label class="col-md-2 control-label" for="example-text-input">{{ $label }}   @if($required)<span style="color:red">*</span>@endif</label>
    <div class="col-md-6">
      	{!! Form::text($columnName, $value, array('class'=>'form-control',  'placeholder' => $placeholder)) !!}
      	@if($helpText)<span class="help-block">{{ $helpText }}</span>@endif
    </div>
</div>