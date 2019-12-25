<?php 
	$value = isset($data->{$col['name']}) ? $data->{$col['name']} : 0;
?>
<label class="switch switch-warning"><input type="checkbox" {!! $value ? 'checked' : '' !!} ><span></span></label>