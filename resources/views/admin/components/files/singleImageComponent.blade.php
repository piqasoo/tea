<?php 
  $component  = (object) $component;
  $label    = isset($component->label) ? $component->label : 'label';
  $columnName = isset($component->columnName) ? $component->columnName : 'name';
  $placeholder = isset($component->placeholder) ? $component->placeholder : 'fill field';
  $helpText = isset($component->helpText) ? $component->helpText : '';
  $required   = isset($component->required) ? true : false;
  $value    = isset($data->$columnName) ? $data->$columnName : null;
  $folder = isset($component->folder) ? $component->folder : 'images';
  $path = isset($value) ? public_path('storage/'.$folder.'/'.$value ) : null;

  if((isset($lang) && $lang)){
    $value = (isset($data->$columnName) && $data->translate($lang) && isset($data->translate($lang)->$columnName)) ? $data->translate($lang)->$columnName : null;
    $errorColumn =  $columnName.'.'.$lang;
    $columnName = $columnName.'['. $lang .']';
  }
?>
<div class="form-group {!! $columnName !!}">
        <label class="col-sm-2 control-label">{{ ucfirst($label) }} @if($required)<span style="color:red">*</span>@endif</label>
        <div class="col-sm-10">
          {!! Form::file($columnName, array('multiple'=>true, 'id'=> $columnName )) !!}
          @if($helpText)<span class="help-block">{{ $helpText }}</span>@endif
        </div>
        @if($errors->has('images'))
        <span class="col-sm-10 col-sm-offset-2 help-block warning">
          <strong>{{ $errors->first('images') }}</strong>
        </span>
        @endif
        @if($value)
        <div class="input-group img-prev col-md-4 img-preview" id="{{ $columnName }}-prev" >
          <img class="{{ $columnName.'-src' }}" src="{{ isset($value) ? asset('uploads/'.$folder. '/' .$value) : '' }}"  alt="Uploaded Image Preview Holder"/> 
        </div>
        @endif
</div>
@push('scripts')
<script>
    let {!! $columnName !!}singleImg = new handleSingleImg('{!! $columnName !!}',{!! $columnName !!});
  $('{!! "#".$columnName !!}').change(function() 
  {
    {{ $columnName }}singleImg.change();
  });
</script>
@endpush
