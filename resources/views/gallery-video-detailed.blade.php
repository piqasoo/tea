@extends('layouts.app')

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@section('content')
<?php $album = $data->data->album; ?>

<section class="gallery-video center-container">
	<section class="gallery-video-item block">
		<h2>{{ $album->title }}</h2>
		<h4>{{ trans('texts.video') }}</h4>
		<div class="video-item">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $album->video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<div class="text">
				<p>{!! $album->text !!}</p>
			</div>

		</div>
		@include('layouts.includes.pageShare')
		<div class="see-more">
		    <a href="{{ route('galleryVideo') }}">{{ trans('texts.back_to_more') }}</a>
		</div>
	</section>
</section>

@endsection