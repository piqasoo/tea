@extends('layouts.app')

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@section('content')
@include('layouts.includes.pageBannerSecondary')
<?php $post = $data->data->post; ?>
<section class="news block">
	<div class="news-container center-container">
		<div class="news-detailed text">
			<h1>{{ $post->title_01 }}</h1>
			@if(isset($post->title_02))
			<h3>{{ $post->title_02 }}</h3>
			@endif
			<label>{{ \Carbon\carbon::parse($post->date)->format('d') }} {{\Carbon\carbon::parse($post->date)->format('F')}} {{ \Carbon\carbon::parse($post->date)->format('Y') }}</label>
			<p>{!! $post->text !!}</p>
			<img src="{{ asset('uploads/news/'.$post->image) }}">
			@include('layouts.includes.pageShare')
			<div class="see-more">
				<a href="{{ route('press') }}">{{ trans('texts.back_to_more') }}</a>
			</div>
		</div>
		
		<aside class="news-aside">
			<h4>{{ trans('texts.other_news') }}</h4>
			@if($data->data->news)
				@foreach($data->data->news as $news)
				<article>
					<a class="albumn-img" href="{{ route('article', ['slug' => $news->slug, 'id' => $news->id]) }}">
						<div  class="img" style="background-image: url({{ asset('uploads/news/'.$news->image) }})">
						</div>
					</a>
					<h3><a href="{{ route('article', ['slug' => $news->slug, 'id' => $news->id]) }}">{{ $news->title_01 }}</a></h3>
					<div>
						<h4>{{ \Carbon\carbon::parse($news->date)->format('d') }} {{ trans('texts.'.\Carbon\carbon::parse($news->date)->format('F')) }} {{ \Carbon\carbon::parse($news->date)->format('Y') }}</h4>
						<div class="see-more">
					     	<a href="{{ route('article', ['slug' => $news->slug, 'id' => $news->id]) }}">{{ trans('texts.see_more') }}</a>
					    </div>
					</div>
				</article>
				@endforeach
			@endif
		</aside>
	</div>
</section>

@endsection