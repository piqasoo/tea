@extends('layouts.app')

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@foreach(Config::get('app.locales') as $lang)

	@section('urlPath_'.$lang)
	reviews
	@endsection

@endforeach

@section('content')

@include('layouts.includes.pageBannerSecondary')

<section class="review block page-content">

	<section class="review-container center-container">
		<div class="focused-container">
			@if(!empty($data->data->reviews))
			@foreach($data->data->reviews as $key => $review)
			<div class="tab-item {{ $key == 0 ? 'current' : '' }}" data-id="{{$key}}">
				<div class="tab-intro">
					<span><i class="fa fa-angle-right"></i></span>
					<h3><label>{{ $review->name }}</label> - {{ $review->title }}</h3>
				</div>
				<div class="tab-content">
					<p>{!! $review->text !!}</p>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</section>
</section>

@endsection