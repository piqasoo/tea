@extends('layouts.app')

@section('content')
@include('layouts.includes.pageBannerSecondary')

<section class="news block page-content">
	<div class="news-container center-container">
		<div class="news-detailed text">
			<img src="{{ asset('uploads/news/'.$data->data->post->image) }}">
			<h1>{{ $data->data->post->title_01 }}</h1>
			<h3>{{ $data->data->post->title_02 }}</h3>
			<label>27 February 2020</label>
			<p>{!! $data->data->post->text !!}</p>
			@include('layouts.includes.pageShare')
		</div>
		<aside class="news-aside">
			<h4>{{ trans('texts.other_news') }}</h4>
			<article>
				<div><a href=""><img src="https://tea.laita.ge/uploads/slider/1578970856.jpg"></a></div>
				<h3><a href="">CONCERTO “LE VIE DELL’AMICIZIA”- VENERDÌ 21 LUGLIO, RAI1 ALLE 23H35</a></h3>
				<h4>27 february 2020</h4>
				<div class="see-more">
			     	<a href="">see more</a>
			    </div>
			</article>
			<article>
				<div><a href=""><img src="https://tea.laita.ge/uploads/slider/1578970856.jpg"></a></div>
				<h3><a href="">CONCERTO “LE VIE DELL’AMICIZIA”- VENERDÌ 21 LUGLIO, RAI1 ALLE 23H35</a></h3>
				<h4>27 february 2020</h4>
				<div class="see-more">
			     	<a href="">see more</a>
			    </div>
			</article>
			<article>
				<div><a href=""><img src="https://tea.laita.ge/uploads/slider/1578970856.jpg"></a></div>
				<h3><a href="">CONCERTO “LE VIE DELL’AMICIZIA”- VENERDÌ 21 LUGLIO, RAI1 ALLE 23H35</a></h3>
				<h4>27 february 2020</h4>
				<div class="see-more">
			     	<a href="">see more</a>
			    </div>
			</article>
		</aside>
	</div>
	<!-- @include('layouts.includes.pageShare') -->
</section>

@endsection