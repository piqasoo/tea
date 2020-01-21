@push('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
<?php 
  $component  = (object) $component;
  $label    = isset($component->label) ? $component->label : 'label';
  $columnName = isset($component->columnName) ? $component->columnName : 'name';
  $placeholder = isset($component->placeholder) ? $component->placeholder : 'fill field';
  $helpText = isset($component->helpText) ? $component->helpText : '';
  $required   = isset($component->required) ? true : false;
  $values    = isset($data->media) && !empty($data->media) ? $data->media()->orderBy('sort', 'ASC')->get() : [];
  $folder = isset($component->folder) ? $component->folder : 'images';
  $path = isset($value) ? 'uploads/'.$folder.'/' : null;
  $maxNumber = isset($component->maxNumber) ? $component->maxNumber : 10;
  $maxFileSize = isset($component->maxFileSize) ? $component->maxFileSize : 1000;
?>
<div class="form-group {!! $columnName !!}">
    <label class="col-sm-2 control-label" for="example-file-multiple-input">{{ ucfirst($label) }} @if($required)<span style="color:red">*</span>@endif</label>
    <div class="col-sm-10">
        {!! Form::file($columnName.'[]', array('multiple'=>true, 'id'=> $columnName )) !!}
        @if($helpText)<span class="help-block">{{ $helpText }}</span>@endif
    </div>
    @if($values)
        <div class="input-group img-prev col-md-10 imgs-preview" id="{{ $columnName }}-prev" >
        	
        	@foreach($values as $key => $value)
        	<div data-id="{{ $value->id }}" id="{{$columnName}}-{{$key}}">
        		<a class="btn btn-primary" href=""><i class="fa fa-times"></i></a>
          		<img class="{{ $columnName.'-src' }} ui-sortable-handle" src="{{ isset($value) ? asset($path.$value->media_value).'?nocache='.rand(0, 10000)  : '' }}"  alt="Uploaded Image Preview Holder" />
        	</div>
          	@endforeach
        </div>
    @endif
    <input type="hidden" name="sort-{{$columnName}}">
</div>

@push('scripts')
<!-- <script src="{{ asset('admin_resources/js/pages/uiDraggable.js') }}"></script>
 -->
 <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <script>
  $( function() {
    
    $( "#{!! $columnName !!}-prev" ).sortable({
	  update: function( event, ui ) {
	  	var array = [];
	  	var sortedIDs = $( this).sortable( "toArray", {"attribute": "data-id"} );
	  	for (var i = 0; i < sortedIDs.length; i++) {
	  		if(sortedIDs[i]){
	  			var obj = {
		  			id : sortedIDs[i],
		  			order: i,
		  		}
		  		array.push(obj);
	  		}
	  	}
	  	console.log(array);
	  	var sortedData = JSON.stringify(array);
	  	$('input[name="sort-{!!$columnName!!}"]').val(sortedData);
	  }
	});
  
  } );
  
  </script>
<script>
    let {!! $columnName !!}singleImg = new handleMultiImgs('{!! $columnName !!}',{!! $columnName !!}, {!! $maxNumber !!}, {!! $maxFileSize !!});
  	$('{!! "#".$columnName !!}').change(function() 
  	{
    	{{ $columnName }}singleImg.change();
    	$( function() {
	    	$( "#{!! $columnName !!}-prev" ).sortable();
		});
  	});
</script>
@endpush