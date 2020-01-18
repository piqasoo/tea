@extends('layouts.app')

@section('content')

@include('layouts.includes.pageBanner')

<div class="biography center-container page-content text">
	<h1>{{ $data->data->biography->title }}</h1>
	<p>{!! $data->data->biography->text !!}</p>

	@include('layouts.includes.pageShare')
</div>



@endsection