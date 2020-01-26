@extends('layouts.app')

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@section('content')

@include('layouts.includes.pageBanner')
<div class="block">
	<div class="biography center-container focused-container text">
		<h1>{{ $data->data->biography->title }}</h1>
		<p>{!! $data->data->biography->text !!}</p>

		@include('layouts.includes.pageShare')
	</div>
</div>
@endsection