@extends('layouts.app')

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@section('content')
@if($data->data->slides && !empty($data->data->slides))
<section class="slider">
	@foreach($data->data->slides as $slide)
    <div style="background-image: url('/uploads/slider/{{ $slide->image }}')">
    	<h2>{{ $slide->title_01 }}</h2>
    	<h3>{{ $slide->title_02 }}</h3>
    	<img style="visibility: hidden;" src="/uploads/slider/{{ $slide->image }}">	
    </div>
    @endforeach
</section>
@endif
<section class="events block">
	<h2>{{ trans('texts.future') }} <span>{{ trans('texts.events') }}</span></h2>
	<h4>{{ trans('texts.events') }}</h4>
	@if($data->data->events && !empty($data->data->events))
	<ul class="center-container">
		@if($data->data->topEvent)
		<?php 
			$topEvent =  $data->data->topEvent;
            $topday = \Carbon\carbon::parse($topEvent->date)->format('d');
            $topmonth = \Carbon\carbon::parse($topEvent->date)->format('F');
        ?>
		<li class="top-event">
			<a href="{{ url('events/'.$topEvent->slug.'/'.$topEvent->id) }}">
				<div class="highlight date"><span class="event-day">{{$topday}}</span> <span class="event-month">{{trans('texts.'.$topmonth)}}</span></div>
				<div>{{ $topEvent->name }}</div>
				<div>{{ $topEvent->place }}</div>
				<div class="highlight">{{ trans('texts.see_more') }}</div>
			</a>
		</li>
		@endif
		@foreach($data->data->events as $event)
		<?php 
            $day = \Carbon\carbon::parse($event->date)->format('d');
            $month = \Carbon\carbon::parse($event->date)->format('F');
            $year = \Carbon\carbon::parse($event->date)->format('Y');
        ?>
		<li>
			<a href="{{ url('events/'.$event->slug.'/'.$event->id) }}">
				<div class="highlight date">{{$day}} {{trans('texts.'.$month)}} {{$year}}</div>
				<div>{{ $event->name }}</div>
				<div>{{ $event->place }}</div>
				<div class="highlight">{{ trans('texts.see_more') }}</div>
			</a>
		</li>
		@endforeach
		<div class="see-more">
	     	<a href="{{ route('events', ['filter' => 'future']) }}">{{ trans('texts.see_more') }}</a>
	    </div>
	</ul>
	@endif

</section>
@if($data->data->photoAlbum)

<section class="gallery-photo block block-dark">
	<h2>{{ trans('texts.gallery') }} <span>{{ trans('texts.photo') }}</span></h2>
	<h4>{{ $data->data->photoAlbum->title }}</h4>
	<div class="gallery-photo-container">
	@if(!empty($data->data->photoAlbum->media))
		@foreach($data->data->photoAlbum->media as $album)
		<figure>

            <a class="" data-fancybox="images" href="{{ asset('uploads/photo_album/'.$album->media_value) }}">
                <div style="background-image: url('{{ asset('uploads/photo_album/'.$album->media_value) }}')"></div>
                <img  class="img-fluid" src="{{ asset('uploads/photo_album/'.$album->media_value) }}">
            </a>
        </figure>
        @endforeach
    @endif
	</div>
	<div class="see-more">
     	<a href="{{ route('galleryPhoto') }}">{{ trans('texts.see_all') }}</a>
    </div>
</section>
@endif
@if($data->data->videos)
<section class="gallery-video block">
	<h2>{{ trans('texts.gallery') }} <span>{{ trans('texts.video') }}</span></h2>
	<h4>{{ trans('texts.video') }}</h4>
	<div class="gallery-video-container center-container">
		@foreach($data->data->videos as $video)
		<div>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		@endforeach
	</div>
	<div class="see-more">
     	<a href="{{ route('galleryVideo') }}">{{ trans('texts.see_more') }}</a>
    </div>
</section>
@endif
@if($data->data->reviews)
<section class="reviews block block-dark">
	<h2>{{ trans('texts.what_do') }}<span> {{ trans('texts.they_say') }}</span></h2>
	<h4>{{ trans('texts.reviews') }}</h4>
	<div class="reviews-container center-container">
		@foreach($data->data->reviews as $review)
		<blockquote cite="">
			<p>{!! $review->text !!}</p>
			<footer>—{{ $review->name }}, <cite>{{ $review->title }}</cite></footer>
		</blockquote>
		@endforeach
	</div>
	<div class="see-more">
     	<a href="{{ route('reviews') }}">{{ trans('texts.see_more') }}</a>
    </div>
</section>
@endif
@if($data->data->news)
<section class="news block ">
	<h2>{{ trans('texts.latest') }} <span>{{ trans('texts.articles') }}</span></h2>
	<h4>{{ trans('texts.press') }}</h4>
	<div class="news-container center-container">
		@foreach($data->data->news as $news)
		<article>
			<a class="albumn-img" href="{{ route('article', ['slug' => $news->slug, 'id' => $news->id]) }}">
				<div  class="img" style="background-image: url({{ asset('uploads/news/'.$news->image) }})">
					<!-- <img src="{{ asset('uploads/news/'.$news->image) }}" style="visibility: hidden;"> -->
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
	<div class="see-more">
     	<a href="{{ route('press') }}">{{ trans('texts.see_more') }}</a>
    </div>
</section>
@endif
<section class="contact block block-dark-secondary">
	<h2>{{ trans('texts.write') }} <span>{{ trans('texts.message') }}</span></h2>
	<h4>{{ trans('texts.letter') }}</h4>
	<div class="contact-container center-container">
		<form
  @submit="checkForm"
  action="https://vuejs.org/"
  method="post">
			<div>
				<div class="form-group">
					<input v-bind:class="{ error: errors.name && errors.visibility }" v-model="contact_form.name" type="text" name="name" placeholder="{{ trans('texts.form_name') }}">
					<p :class="[errors.name && errors.visibility ? errorClass : '', 'form-msgs', success ? successClass : '']"><i class="fa fa-exclamation"></i> {{ trans('texts.name_is_required') }}</p>
				</div>
				<div class="form-group">
					<input v-bind:class="{ error: errors.email && errors.visibility  }" v-model="contact_form.email" type="text" name="email" placeholder="{{ trans('texts.form_email') }}">
					<p :class="[errors.email && errors.visibility ? errorClass : '', 'form-msgs', success ? successClass : '']"><i class="fa fa-exclamation"></i> {{ trans('texts.email_is_required') }}</p>
					<p :class="[errors.validEmail && errors.visibility && !errors.email ? errorClass : '', 'form-msgs', success ? successClass : '']"><i class="fa fa-exclamation"></i> {{ trans('texts.not_valid_email') }}</p>
				</div>
				<div class="form-group">
					<input v-bind:class="{ error: errors.phone && errors.visibility  }" v-model="contact_form.phone" type="text" name="phone" placeholder="{{ trans('texts.form_phone') }}">
					<p :class="[errors.phone && errors.visibility ? errorClass : '', 'form-msgs', success ? successClass : '']"><i class="fa fa-exclamation"></i> {{ trans('texts.phone_is_required') }}</p>
				</div>
			</div>
			<div class="form-group textarea">
				<textarea v-bind:class="{ error: errors.message && errors.visibility }" v-model="contact_form.message" v-on:change="checkForm($event)" name="message" placeholder="{{ trans('texts.form_message') }}" rows="3"></textarea>
				<p :class="[errors.message && errors.visibility ? errorClass : '', 'form-msgs', success ? successClass : '']"><i class="fa fa-exclamation"></i> {{ trans('texts.message_is_required') }}</p>
			</div>
			
			<p :class="[errors.grecaptcha ? errorClass : '']"><i class="fa fa-exclamation"></i> {{ trans('texts.not_valid_security_code') }}</p>
			<p :class="[success ? successClass : '']">{{ trans('texts.message_sent') }}</p>
			<!-- <recaptcha-component></recaptcha-component> -->
			<vue-recaptcha sitekey="6LcMKtQUAAAAAKqFfPfcOJndlXWaw6XicIx_mYiP" :loadRecaptchaScript="true" theme="dark"></vue-recaptcha>
			<input class="btn-submit" type="submit" v-on:submit="checkForm($event)" value="{{ trans('texts.submit') }}">
		</form>
	</div>
</section>
@endsection
