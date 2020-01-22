@extends('layouts.app')

@section('content')

@include('layouts.includes.pageTitle')
<section class="news block page-content">
<!-- 	<h2>latest <span>articles</span></h2>
	<h4>press</h4> -->
	@if($data->data->news)
	<div class="news-container center-container">
		@foreach($data->data->news as $news)
		<article>
			<div class="albumn-img">
				<a href="{{ route('article', ['slug' => $news->slug, 'id' => $news->id]) }}" class="img" style="background-image: url({{ asset('uploads/news/'.$news->image) }})"><img src="{{ asset('uploads/news/'.$news->image) }}" style="visibility: hidden;"></a>
			</div>
			<h3><a href="{{ route('article', ['slug' => $news->slug, 'id' => $news->id]) }}">{{ $news->title_01 }}</a></h3>
			<h4>{{ \Carbon\carbon::parse($news->date)->format('d') }} {{\Carbon\carbon::parse($news->date)->format('F')}} {{ \Carbon\carbon::parse($news->date)->format('Y') }}</h4>
			<div class="see-more">
		     	<a href="{{ route('article', ['slug' => $news->slug, 'id' => $news->id]) }}">{{ trans('texts.see_more') }}</a>
		    </div>
		</article>
		@endforeach
	</div>
	@endif
<!-- 	<div class="see-more">
     	<a href="">see more</a>
    </div> -->
</section>
@endsection