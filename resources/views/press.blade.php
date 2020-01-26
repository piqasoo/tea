@extends('layouts.app')

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@section('content')

<section class="news page-title block">
	<h2>{{ trans('texts.latest') }} <span>{{ trans('texts.articles') }}</span></h2>
	<h4>{{ trans('texts.press') }}</h4>
</section>
<section class="news page-content">
	@if($data->data->news)
	<div class="news-container center-container">
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
	</div>
	@endif
</section>
@endsection