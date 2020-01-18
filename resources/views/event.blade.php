@extends('layouts.app')

@section('content')
@include('layouts.includes.pageBannerSecondary')
<!-- <section class="news page-title block page-content">
				<h2>Event: <span>{{$data->data->event->name}}</span></h2>
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
							<span class="event-month">{{$M}}</span>
							<span>{{$Y}}</span>
						</div>
					</div>
				</div>
			</section> -->
<section class="events block page-content">
	<div class="events-container center-container">
		<div class="event-item">
			<h2>event name</h2>
			<div class="event-date">
					<?php 
			            $D = \Carbon\carbon::parse($data->data->event->date)->format('d');
			            $M = \Carbon\carbon::parse($data->data->event->date)->format('F');
			            $Y = \Carbon\carbon::parse($data->data->event->date)->format('Y');
			        ?>
			        <div class="">
						<i class="fa fa-calendar"></i>
						<span class="event-day">{{$D}}</span>
						<span class="event-month">{{$M}}</span>
						<span>{{$Y}}</span>
					</div>
			</div>
			<div class="event-item-body">
				<div><i class="fa fa-map-marker" aria-hidden="true"></i><a href="">Place: Rome</a></div>
				<div><i class="fa fa-ticket"></i><a href="">Ticket: buy</a></div>
				<div class="text">
					<p>Recite il 7 e 8 Marzo 2020
					<br>
					Juraj Valčuha Dirigent
					<br>
					Elena Zhidkova Mezzosopran
					<br>
					Antonio Poli Tenor
					<br>
					Riccardo Zanellato Bass
					<br>
					Symphonischer Chor Bamberg Chor
					</p>
				</div>
			</div>
		</div>
		<div class="event-item active">
			<h1>Elena Zhidkova Mezzosopran
Antonio Poli Tenor</h1>
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
							<span class="event-month">{{$M}}</span>
							<span>{{$Y}}</span>
						</div>
					</div>
			</div>
			<div class="event-item-body">
				<div><i class="fa fa-map-marker" aria-hidden="true"></i><a href="">Place: Rome</a></div>
				<div><i class="fa fa-ticket"></i><a href="">Ticket: buy</a></div>
				<div class="text">
					<p>Recite il 7 e 8 Marzo 2020
					<br>
					Juraj Valčuha Dirigent
					<br>
					Elena Zhidkova Mezzosopran
					<br>
					Antonio Poli Tenor
					<br>
					Riccardo Zanellato Bass
					<br>
					Symphonischer Chor Bamberg Chor
					</p>
				</div>
			</div>
		</div>
		<div class="event-item">
			<h2>event name</h2>
			<div class="event-date">
					<?php 
			            $D = \Carbon\carbon::parse($data->data->event->date)->format('d');
			            $M = \Carbon\carbon::parse($data->data->event->date)->format('F');
			            $Y = \Carbon\carbon::parse($data->data->event->date)->format('Y');
			        ?>
			        <div class="">
						<i class="fa fa-calendar"></i>
						<span class="event-day">{{$D}}</span>
						<span class="event-month">{{$M}}</span>
						<span>{{$Y}}</span>
					</div>
			</div>
			<div class="event-item-body">
				<div><i class="fa fa-map-marker" aria-hidden="true"></i><a href="">Place: Rome</a></div>
				<div><i class="fa fa-ticket"></i><a href="">Ticket: buy</a></div>
				<div class="text">
					<p>Recite il 7 e 8 Marzo 2020
					<br>
					Juraj Valčuha Dirigent
					<br>
					Elena Zhidkova Mezzosopran
					<br>
					Antonio Poli Tenor
					<br>
					Riccardo Zanellato Bass
					<br>
					Symphonischer Chor Bamberg Chor
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- @include('layouts.includes.pageShare') -->
</section>

@endsection