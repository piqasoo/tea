@extends('layouts.app')

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@foreach(Config::get('app.locales') as $lang)

	@section('urlPath_'.$lang)
	gallery-video
	@endsection

@endforeach

@section('content')

@include('layouts.includes.pageBannerSecondary')
<?php $albums = $data->data->albums; ?>

<!-- <section class=""> -->
	<section class="gallery-video block center-container">
		<h2>{{ trans('texts.gallery') }} <span>{{ trans('texts.video') }}</span></h2>
		<h4>{{ trans('texts.videos') }}</h4>
		@if(count($albums) > 0)
		<div class="gallery-video-items">
			@foreach($albums->chunk(2) as $chunks)
			<div class="gallery-video-chunk">
				@foreach($chunks as $album)
					<div class="albumn-container">
						<a href="{{ route('galleryVideoDetailed', ['slug' => $album->slug, 'id' => $album->id ]) }}">
							<div class="albumn-img">
								<div class="img" style="background-image: url({{ asset('/uploads/video/'.$album->image)  }})"></div>
				            </div>
				            
				            <div class="albumn-description">
				            	<h3>{{ $album->title }}</h3>
				            </div>
						</a>
			        </div>
				@endforeach
			</div>
	        @endforeach
		</div>
		@endif
		<div class="pagination-container">
			{{ $albums->links() }}
		</div>
		
	</section>
<!-- </section> -->

@endsection