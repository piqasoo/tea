<?php 
	$component 	= (object) $component;
	$label 		= isset($component->label) ? $component->label : 'label';
	$columnName = isset($component->columnName) ? $component->columnName : 'name';
	$placeholder = isset($component->placeholder) ? $component->placeholder : 'fill text..';
	$helpText	= isset($component->helpText) ?	$component->helpText : '';
	$required 	= isset($component->required) ? true : false;
	$value 		= isset($data->$columnName) ? $data->$columnName : null;
?>
<div class="form-group col-md-12">
    <label class="col-md-2 control-label" for="example-text-input">{{ $label }} <span style="color:red">*</span></label>
    <div class="col-md-9 input-group">
        {!! Form::textarea($columnName.'['.$locale.']', $value, array('class'=>'form-control editor', 'rows'=> '4', 'placeholder' => $placeholder)) !!}
        @if($helpText)<span class="help-block">{{ $helpText }}</span>@endif
    </div>
</div>