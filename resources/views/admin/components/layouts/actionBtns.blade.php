<a href="{{ route($data->editRoute, ['id' => $id ]) }}" class="btn btn-primary">Details</a>
{!! Form::open(array('method' => 'DELETE', 'action'=> [$data->deleteRoute, $id], 'style'=>'display:inline-block')) !!}
<button class="btn btn-primary" style="background: #e74c3c; color: #fff; border-color: #e74c3c;" onClick="return confirm('Are you sure you want to delete this item?')">Delete</button>
{!! Form::close() !!}