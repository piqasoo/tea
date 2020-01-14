<?php 
	$component 	= (object) $component;
	$label 		= isset($component->label) ? $component->label : 'label';
	$columnName = isset($component->columnName) ? $component->columnName : 'name';
	$errorColumn = isset($component->columnName) ? $component->columnName : 'name';
	$placeholder = isset($component->placeholder) ? $component->placeholder : 'fill field';
	$helpText	= isset($component->helpText) ?	$component->helpText : '';
	$required 	= isset($component->required) ? true : false;
	$value = isset($data->$columnName) ? $data->$columnName : null;

	if((isset($lang) && $lang)){
		$value = (isset($data->$columnName) && $data->translate($lang) && isset($data->translate($lang)->$columnName)) ? $data->translate($lang)->$columnName : null;
		$errorColumn = 	$columnName.'.'.$lang;
		$columnName = $columnName.'['. $lang .']';
	}	
?>
<div class="form-group {{ $errors->has($errorColumn) ? 'has-error' : '' }} col-md-12">
    <label class="col-md-2 control-label" for="example-text-input">{{ ucfirst($label) }}   @if($required)<span style="color:red">*</span>@endif</label>
    <div class="col-md-6" id="{{ $columnName }}-youtube-parent-container">
      	{!! Form::text($columnName, $value, array('class'=>'form-control',  'placeholder' => $placeholder, 'id'=> $columnName)) !!}
      	@if($helpText)<span class="">{{ $helpText }}</span>@endif
      	@if($errors->has($errorColumn))<div class="help-block animation-slideDown">{{ $errors->first($errorColumn) }}</div>@endif
    </div>
<!--     @if($value) -->
	
	<!-- @endif -->
</div>
<div class="form-group col-md-12" id="{{ $columnName }}-youtube" style="display: {{ $value ? '' : 'none'  }};">
		<label class="col-md-2 control-label" style="visibility: hidden;">{{ ucfirst($label) }}</label>
	    <div class="col-md-6">
	        <iframe id="{{ $columnName }}-videoObject" width="560" height="315" frameborder="0"  allowfullscreen src="https://www.youtube.com/embed/{{ $value }}?autoplay=1&enablejsapi=1"></iframe>
	    </div>
	</div>
@push('scripts')
<script>
	let {!! $columnName !!}youtube = new validateYouTubeUrl('{!! $columnName !!}','{!! $value !!}');
	$('{!! "#".$columnName !!}').change(function() 
	{
	    {{ $columnName }}youtube.change(this.value);
	});
    
</script>
@endpush