@extends('layouts.app')

@section('content')

<section class="news block page-content">
	<div class="news-container center-container">
		<div class="news-detailed text">
			<img src="{{ asset('uploads/news/'.$data->data->post->image) }}">
			<h1>{{ $data->data->post->title_01 }}</h1>
			<h3>{{ $data->data->post->title_02 }}</h3>
			<label>27 February 2020</label>
			<p>{!! $data->data->post->text !!}</p>
		</div>
		<aside></aside>
	</div>
	@include('layouts.includes.pageShare')
</section>

@endsection