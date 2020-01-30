@extends('layouts.app')
<?php $lang = Config::get('app.locale'); ?>

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@foreach(Config::get('app.locales') as $lang)

	@section('urlPath_'.$lang)
	{{ $data->data->model == 'passedEvents' ? 'events/passed' : 'events/future'}}
	@endsection

@endforeach

@section('content')

@include('layouts.includes.pageBanner')
<section class="events block page-content">
<!-- 	<h2>Future <span>events</span></h2>
	<h4>events</h4> -->
	<!-- <div class="center-container">
		<label class="btn-label {{ $data->data->filter && $data->data->filter == 'future' ? 'active' : '' }}"><a href="{{ route('events', ['filter' => 'future']) }}">Future</a></label>
		<label class="btn-label {{ $data->data->filter && $data->data->filter == 'passed' ? 'active' : '' }}"><a href="{{ route('events', ['filter' => 'passed']) }}">passed</a></label>
	</div> -->
	@if($data->data->events && !empty($data->data->events))
	<ul class="center-container">
		@if($data->data->topEvent)
		<?php 
			$topEvent =  $data->data->topEvent;
            $topday = \Carbon\carbon::parse($topEvent->date)->format('d');
            $topmonth = \Carbon\carbon::parse($topEvent->date)->format('F');
        ?>
		<li class="top-event">
			<a href="{{ route('event', ['slug' => $topEvent->slug, 'id' => $topEvent->id]) }}">
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
			<a href="{{ route('event', ['slug' => $event->slug, 'id' => $event->id]) }}">
				<div class="highlight date">{{$day}} {{trans('texts.'.$month)}} {{$year}}</div>
				<div>{{ $event->name }}</div>
				<div>{{ $event->place }}</div>
				<div class="highlight">{{ trans('texts.see_more') }}</div>
			</a>
		</li>
		@endforeach
	</ul>
	@endif
</section>


@endsection