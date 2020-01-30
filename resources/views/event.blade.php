@extends('layouts.app')
<?php 	$event = $data->data->event;
		$events = $data->data->events ?>

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@foreach(Config::get('app.locales') as $lang)

	@section('urlPath_'.$lang)
	events/{{$event->translate($lang)->slug}}/{{$event->id}}
	@endsection

@endforeach

@section('content')
@include('layouts.includes.pageBannerSecondary')

<section class="events block page-content">
	<div class="events-container center-container">
		@if(count($events) >= 2)
		<div class="event-item">
			<h2>{{ $events[0]->name }}</h2>
			<div class="event-date">
					<?php 
			            $D = \Carbon\carbon::parse($events[0]->date)->format('d');
			            $M = \Carbon\carbon::parse($events[0]->date)->format('F');
			            $Y = \Carbon\carbon::parse($events[0]->date)->format('Y');
			        ?>
			        <div class="">
						<i class="fa fa-calendar"></i>
						<span class="event-day">{{$D}}</span>
						<span class="event-month">{{ trans('texts.'.$M) }}</span>
						<span>{{$Y}}</span>
					</div>
			</div>
			<div class="event-item-body">
				<div><i class="fa fa-map-marker" aria-hidden="true"></i><a href="{{ $events[0]->address_link ? $events[0]->address_link : 'javascript:void(0)' }}" target="{{ $events[0]->address_link ? '_blank' : '' }}">{{ trans('texts.place') }}: {{ $events[0]->place }}</a></div>
				@if($events[0]->ticket)
				<div><i class="fa fa-ticket"></i><a href="{{ $events[0]->ticket }}" target="_blank">{{ trans('texts.Ticket') }}: {{ trans('texts.buy') }}</a></div>
				@endif
				<div class="text">
					{!! $events[0]->text !!}
				</div>
			</div>
		</div>
		@endif
		<div class="event-item active">
			<h1>{{ $event->name }}</h1>
			<div class="event-date">
					<?php 
			            $D = \Carbon\carbon::parse($data->data->event->date)->format('d');
			            $M = \Carbon\carbon::parse($data->data->event->date)->format('F');
			            $Y = \Carbon\carbon::parse($data->data->event->date)->format('Y');
			        ?>
			        <div class="top-event">
						<i class="fa fa-calendar"></i>
						<span class="event-day">{{$D}}</span>
						<div>
							<span class="event-month">{{ trans('texts.'.$M) }}</span>
							<span>{{$Y}}</span>
						</div>
					</div>
			</div>
			<div class="event-item-body">
				<div><i class="fa fa-map-marker" aria-hidden="true"></i><a href="{{ $event->address_link ? $event->address_link : 'javascript:void(0)' }}" target="{{ $event->address_link ? '_blank' : '' }}">{{ trans('texts.place') }}: {{ $event->place }}</a></div>
				@if($event->ticket)
				<div><i class="fa fa-ticket"></i><a href="{{ $event->ticket }}" target="_blank">{{ trans('texts.Ticket') }}: {{ trans('texts.buy') }}</a></div>
				@endif
				<div class="text">
					{!! $event->text !!}
				</div>
			</div>

		</div>
		@if(count($events) >= 2)
		<div class="event-item">
			<h2>{{ $events[1]->name }}</h2>
			<div class="event-date">
					<?php 
			            $D = \Carbon\carbon::parse($events[1]->date)->format('d');
			            $M = \Carbon\carbon::parse($events[1]->date)->format('F');
			            $Y = \Carbon\carbon::parse($events[1]->date)->format('Y');
			        ?>
			        <div class="">
						<i class="fa fa-calendar"></i>
						<span class="event-day">{{$D}}</span>
						<span class="event-month">{{ trans('texts.'.$M) }}</span>
						<span>{{$Y}}</span>
					</div>
			</div>
			<div class="event-item-body">
				<div><i class="fa fa-map-marker" aria-hidden="true"></i><a href="{{ $events[1]->address_link ? $events[1]->address_link : 'javascript:void(0)' }}" target="{{ $events[1]->address_link ? '_blank' : '' }}">{{ trans('texts.place') }}: {{ $events[1]->place }}</a></div>
				@if($events[1]->ticket)
				<div><i class="fa fa-ticket"></i><a href="{{ $events[1]->ticket }}" target="_blank">{{ trans('texts.Ticket') }}: {{ trans('texts.buy') }}</a></div>
				@endif
				<div class="text">
					{!! $events[1]->text !!}
				</div>
			</div>
		</div>
		@endif
	</div>
	<div class="center-container">
		@include('layouts.includes.pageShare')
	</div>
	<div class="see-more">
	    <a href="{{ route('events', ['filter' => 'future']) }}">{{ trans('texts.back_to_more') }}</a>
	</div>
	<!-- @include('layouts.includes.pageShare') -->
</section>

@endsection