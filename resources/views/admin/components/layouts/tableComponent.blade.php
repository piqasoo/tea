<!-- Datatables Header -->
<?php
  $modelName = isset($data->model->title) ? $data->model->title : '';
  $parent = isset($data->parentComponent) ? $data->parentComponent : [];
  $cols = (!empty($parent) && isset($parent['cols']) && !empty($parent['cols'])) ? $parent['cols'] : [];
?>
<div class="content-header">
  <div class="header-section">
    <h1>
      <i class="gi gi-leaf"></i>{{ $modelName }}<br><small>List of something!</small>
    </h1>
  </div>
</div>
<!-- <ul class="breadcrumb breadcrumb-top">
  <li></li>
</ul> -->
@if(\Session::get('msg'))
  <div class="form-group">
    <div class="alert alert-info text-center">
      {{ \Session::get('msg') }}
    </div>
  </div>
@endif
<!-- END Datatables Header -->
<div class="block full">
  <div class="right clearfix"><a href="{{ route($data->route) }}" class="btn btn-primary"> Add {{ $modelName }}</a></div>

<div id="ecom-orders_wrapper" class="dataTables_wrapper form-inline no-footer">
  <div class="row">
    <div class="col-sm-6 col-xs-5">
    </div>
    <div class="col-sm-6 col-xs-7">
      <div id="ecom-orders_filter" class="dataTables_filter">
        <label>
          <form method="get" action="">
          <div class="input-group">
            <input type="text" name="key" value="" class="form-control" placeholder="Search" aria-controls="ecom-orders">
          </div>
          <div class="input-group">
            <button class="form-control input-group-addon"><i class="fa fa-search"></i></button>
          </div>
          </form>
        </label>
      </div>
    </div>
  </div>

  <table id="ecom-orders" class="table table-bordered table-striped table-vcenter dataTable no-footer" role="grid" aria-describedby="ecom-orders_info">
    @if(!empty($cols))
    <thead>
      <tr>
        @foreach($cols as $col)
        <th>{{ $col['name'] }}</th>
        @endforeach
      </tr>
    </thead>
    @endif
    <tbody>
    @if(isset($data->data) && !empty($data->data))
      @foreach($data->data as $row)
        <tr>
          @foreach($cols as $col)
          @if(!isset($col['component']))
          <td>{{ $row[$col['value']] }}</td>
          @else
          <td class="text-center">
          @include('admin.components.'.$col['component'], ['parent' => $data, 'data' => $row, 'id' => $row->id, 'col' => $col ])
          </td>
          @endif
          @endforeach
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
    <div class="row">
      <div class="col-sm-12">
        
        <span style="visibility: hidden">pagination</span>
      </div>
    </div>
  </div>
</div>

@section('scripts')

<!-- <script type="text/javascript">

  $("input[name='visibility']").change(function() {

      var id = $(this).attr('data-id');
      var value = $(this).is(":checked") ? 1 : 0;
      var token = $('meta[name=csrf-token]').attr('content');

      $.post({
          url: "/admin/about/set/visibility",
          cache: false,
          dataType: 'json',
          data: {
            id: id,
            value: value,
            _token: token,
          },
            beforeSend: function (xhr) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
            })
            .done(function (msg) {
                console.log(msg);
            })
            .fail(function(xhr, status, error) {

              var err = eval("(" + xhr.responseText + ")");
              console.log(err.Message);

            });
  });
</script> -->
<script type="text/javascript">
  let activeInput = $("input[name='active']");

  if(activeInput.length > 0){
    activeInput.change(function(){
      var id = $(this).attr('data-id');
      var value = $(this).is(":checked") ? 1 : 0;
      var token = $('meta[name=csrf-token]').attr('content');

      <?php if(isset($data->visibilityRoute)): ?>
        $.post({
          url: '<?= $data->visibilityRoute ?>',
          cache: false,
          dataType: 'json',
          data: {
            id: id,
            value: value,
            _token: token,
          },
            beforeSend: function (xhr) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
            })
            .done(function (msg) {
                console.log(msg);
            })
            .fail(function(xhr, status, error) {

              var err = eval("(" + xhr.responseText + ")");
              console.log(err.Message);

            });

      <?php endif ?>

    });
      
  }
  // $("input[name='visibility']").change(function() {

  //     var id = $(this).attr('data-id');
  //     var value = $(this).is(":checked") ? 1 : 0;
  //     var token = $('meta[name=csrf-token]').attr('content');

  //     $.post({
  //         url: "/admin/press/set/visibility",
  //         cache: false,
  //         dataType: 'json',
  //         data: {
  //           id: id,
  //           value: value,
  //           _token: token,
  //         },
  //           beforeSend: function (xhr) {
  //               return xhr.setRequestHeader('X-CSRF-TOKEN', token);
  //             }
  //           })
  //           .done(function (msg) {
  //               console.log(msg);
  //           })
  //           .fail(function(xhr, status, error) {

  //             var err = eval("(" + xhr.responseText + ")");
  //             console.log(err.Message);

  //           });
  // });
</script>

@stop
