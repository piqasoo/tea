<?php 
	$id = isset($data->id) ? $id : 0;
	$value = isset($data->{$col['name']}) ? $data->{$col['name']} : 0;
?>

<label class="switch switch-warning">
	<input type="checkbox" data-id="{{ $id }}" value="1" id="visibility" name="active" {!! $value ? 'checked' : '' !!} ><span></span>
</label>