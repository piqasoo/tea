<?php 
	$component 	= (object) $component;
	$label 		= isset($component->label) ? $component->label : 'label';
	$columnName = isset($component->columnName) ? $component->columnName : 'name';
	$errorColumn = isset($component->columnName) ? $component->columnName : 'name';
	$placeholder = isset($component->placeholder) ? $component->placeholder : 'fill text..';
	$helpText	= isset($component->helpText) ?	$component->helpText : '';
	$required 	= isset($component->required) ? true : false;
	$value 		= isset($data->{$columnName}) ? $data->{$columnName} : null;
	$options = null;
	$optionName = isset($component->optionName) ? $component->optionName : 'name';
	$optionKey = isset($component->optionKey) ? $component->optionKey : 'value';
	if(isset($component->dataLoad) && !empty($component->dataLoad)){
		$options = $component->dataLoad;
	}
	$colWidth = isset($component->colWidth) ? $component->colWidth : "6";
?>
<div class="form-group {{ $errors->has($errorColumn) ? 'has-error' : '' }} col-md-12">
    <label class="col-md-2 control-label">{{ ucfirst($label) }}  </label>
    <div class="col-md-{!!$colWidth!!}">
        <select name="{{$columnName}}" class="sections form-control select-chosen" data-placeholder="{{$placeholder}}">
            <!-- <option disabled selected></option> -->
            @foreach($options as $option)
            <?php $option = (object) $option; ?>
            <option value="{{ $option->{$optionKey} }}" {{ $value == $option->{$optionKey} ? 'selected' : '' }}>{{ $option->{$optionName} }}</option>
            @endforeach
        </select>
    </div>
</div>