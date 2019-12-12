<div class="form-group">
        <label class="col-sm-2 control-label">Images <span style="color:red">*</span></label>
        <div class="col-sm-10">
          {!! Form::file('images[]', array('multiple'=>true)) !!}
          <span class="help-block">Recomanded size 1200x600 pixel (600x300 pix)</span>
        </div>
        @if ($errors->has('images'))
        <span class="col-sm-10 col-sm-offset-2 help-block warning">
          <strong>{{ $errors->first('images') }}</strong>
        </span>
        @endif
</div>
