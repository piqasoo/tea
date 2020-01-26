@extends('layouts.app')

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@section('content')
<?php $album = $data->data->album; ?>

<section class="gallery-photo-container">
	<section class="gallery-photo block">
		@if(count($album->media) > 0)
		<div class="albumn-items-container">
			@foreach($album->media as $image)
			<a class="albumn-items" data-fancybox="images" href="{{ asset('/uploads/photo_album/'.$image->media_value)  }}">
				<img class="img-fluid" src="{{ asset('/uploads/photo_album/'.$image->media_value)  }}">
			</a>
			@endforeach
		</div>
		<div class="albumn-item-container center-container">
			<!-- <div class="img" style="background-image: url('/images/tea.jpg');"></div> -->
			<img id="albumn-item" class="active-item" src="{{ asset('/uploads/photo_album/'.$album->media()->first()->media_value)  }}">
		</div>
		@endif
		<h2>{{ $album->title }}</h2>
		<h4>{{ trans('texts.album') }}</h4>
		<div class="center-container">
			@include('layouts.includes.pageShare')
		</div>
		<div class="see-more">
		    <a href="{{ route('galleryPhoto') }}">{{ trans('texts.back_to_more') }}</a>
		</div>
	</section>

</section>


@endsection