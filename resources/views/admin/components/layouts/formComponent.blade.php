<?php $btnName = ''; if(isset($data->method) && ($data->method == 'PUT')): $btnName = 'UPDATE'; else: $btnName = 'CREATE';  endif ?>
<?php
  $modelName = isset($data->model->title) ? $data->model->title : '';
?>
@section('css')
<link href="/admin_resources/froala/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
<link href="/admin_resources/froala/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<link href="/admin_resources/froala/css/themes/custom-theme.css" rel="stylesheet" type="text/css" />
@endsection
<div class="content-header">
    <div class="header-section">
      <h1>
        <i class="gi gi-leaf"></i>{{ ucfirst($data->model->title) }}<br>
        @if($data->formDescription)
        <small>{{ $data->formDescription }}</small>
        @endif
      </h1>
    </div>
  </div>
<ul class="breadcrumb breadcrumb-top">
  <li>{{ $data->model->title }}</li>
</ul>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['method' => $data->method, 'route' => $data->action, 'enctype'=>"multipart/form-data" ]) !!}
@if(!empty($data->gnComponents))
<div class="row">
  <div class="col-md-12">
    <div class="block full col-md-12">
      <div class="block-title">
          <h2><strong> General</strong> data fields</h2>
      </div>
          <!-- Inculde general components -->
      <div class="form-horizontal form-bordered">
      @foreach($data->gnComponents as $gnComponent)
        @include('admin.components.'.$gnComponent['name'], ['data' => $data->data, 'component' => $gnComponent])
      @endforeach
      </div>
    </div>
  </div>
</div>
@endif
@if($data->multiLang && !empty($data->trComponents))
<div class="row">
  <div class="col-md-12">
    <div class="block full col-md-12">
        <!-- If multiLangual module and if translatable components -->
          
            <div class="block-title">
                <h2><strong> Translatable</strong> data fileds</h2>
            </div>
            <ul class="nav nav-tabs">
              <?php foreach (Config::get('app.locales') as $key => $locale): ?>
                <li {!! $key == 0 ? 'class = "active"' : "" !!}><a href="#{!! $locale !!}" data-toggle="tab">{!! $locale !!}</a></li>
              <?php endforeach ?>
            </ul>
            <div class="tab-content" style="overflow:visible!important">
              <?php foreach (Config::get('app.locales') as $key => $locale): $required = ($key==0) ? 'required' : null?>
              <div class="tab-pane fade {!! $key == 0 ? 'active in' : '' !!} form-horizontal form-bordered" id="{!! $locale !!}">
              @foreach($data->trComponents as $trComponent)
                  @include('admin.components.'.$trComponent['name'], ['data' => $data->data, 'component' => $trComponent, 'lang' => $locale])
              @endforeach
              </div>
              <?php endforeach ?>
            </div>
         
    </div>
  </div>
</div>
@endif
@if($data->multiLang && !empty($data->seoComponents))
<div class="row">
  <div class="col-md-12">
    <div class="block full col-md-12">
        <!-- If multiLangual module and if translatable components -->
          
            <div class="block-title">
                <h2><strong> SEO</strong> data fileds</h2>
            </div>
            <ul class="nav nav-tabs">
              <?php foreach (Config::get('app.locales') as $seoKey => $locale): ?>
                <li {!! $seoKey == 0 ? 'class = "active"' : "" !!}><a href="#seo-{!! $locale !!}" data-toggle="tab">{!! $locale !!}</a></li>
              <?php endforeach ?>
            </ul>
            <div class="tab-content" style="overflow:visible!important">
              <?php foreach (Config::get('app.locales') as $seoKey => $locale): $required = ($seoKey==0) ? 'required' : null?>
              <div class="tab-pane fade {!! $seoKey == 0 ? 'active in' : '' !!} form-horizontal form-bordered" id="seo-{!! $locale !!}">
              @foreach($data->seoComponents as $seoComponent)
                  @include('admin.components.'.$seoComponent['name'], ['data' => $data->data, 'component' => $seoComponent, 'lang' => $locale])
              @endforeach
              </div>
              <?php endforeach ?>
            </div>
         
    </div>
  </div>
</div>
@endif
<div class="row">
  <div class="col-md-12">
    <div class="block full col-md-12">
       <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            {!! Form::submit($btnName, array('class'=>'btn btn-primary pull-right')) !!}
          </div>
        </div>
    </div>
  </div>
</div>
{!! Form::close() !!}


@section('scripts')
<script src="/admin_resources/froala/js/froala_editor.min.js"></script>
<script src="/admin_resources/froala/js/plugins/media_manager.min.js"></script>
<script src="/admin_resources/froala/froala.init.js"></script>
@endsection