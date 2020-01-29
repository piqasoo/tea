@extends('layouts.app')

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@foreach(Config::get('app.locales') as $lang)

	@section('urlPath_'.$lang)
	gallery-photo
	@endsection

@endforeach

@section('content')

@include('layouts.includes.pageBannerSecondary')
<?php $albums = $data->data->albums; ?>

<section class="gallery-photo block center-container">
		<h2>{{ trans('texts.gallery') }} <span>{{ trans('texts.photo') }}</span></h2>
		<h4>{{ trans('texts.albums') }}</h4>
		@if(count($albums) > 0)
		<div class="gallery-photo-container">
			@foreach($albums as $album)
			<div class="albumn-container">
				<a href="{{ route('galleryPhotoDetailed', ['slug' => $album->slug, 'id' => $album->id ]) }}">
					<div class="albumn-img">
						<div class="img" style="background-image: url({{ asset('/uploads/photo_album/'.$album->image)  }})"></div>
		            </div>
		            
		            <div class="albumn-description">
		            	<h3>{{ $album->title }}</h3> <!----> 
		            	<small><i class="fa fa-search-plus"></i> {{ trans('texts.images') }}: {{ count($album->media) }}</small></div>
				</a>
	        </div>
	        @endforeach
		</div>
		@endif
</section>

@endsection