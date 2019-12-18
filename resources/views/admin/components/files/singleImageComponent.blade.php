<?php 
  $component  = (object) $component;
  $label    = isset($component->label) ? $component->label : 'label';
  $columnName = isset($component->columnName) ? $component->columnName : 'name';
  $placeholder = isset($component->placeholder) ? $component->placeholder : 'fill field';
  $helpText = isset($component->helpText) ? $component->helpText : '';
  $required   = isset($component->required) ? true : false;
  $value    = isset($data->$columnName) ? $data->$columnName : null;
  $folder = isset($data->folder) ? $data->folder : 'images';
  $path = isset($value) ? public_path('storage/'.$folder.'/'.$value ) : null;
?>
<div class="form-group">
        <label class="col-sm-2 control-label">{{ $label }} @if($required)<span style="color:red">*</span>@endif</label>
        <div class="col-sm-10">
          {!! Form::file($columnName, array('multiple'=>true)) !!}
          @if($helpText)<span class="help-block">{{ $helpText }}</span>@endif
        </div>
        @if($errors->has('images'))
        <span class="col-sm-10 col-sm-offset-2 help-block warning">
          <strong>{{ $errors->first('images') }}</strong>
        </span>
        @endif
</div>
