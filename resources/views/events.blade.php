@extends('layouts.app')

@section('content')

@include('layouts.includes.pageBanner')
<section class="events block page-content">
<!-- 	<h2>Future <span>events</span></h2>
	<h4>events</h4> -->
	<div class="center-container">
		<label><a href="">Future</a></label>
		<label><a href="">passed</a></label>
	</div>
	<ul class="center-container">
		<li class="top-event">
			<a href="">
				<div class="highlight date"><span class="event-day">12</span> <span class="event-month">february</span></div>
				<div>Torino</div>
				<div>Nabucco</div>
				<div class="highlight">see more</div>
			</a>
		</li>
		<li>
			<a href="">
				<div class="highlight date">12 December 2020</div>
				<div>Konzerthalle, Bamberg</div>
				<div>Nabucco</div>
				<div class="highlight">see more</div>
			</a>
		</li>
		<li>
			<a href="">
				<div class="highlight date">12 November 2020</div>
				<div>Torino</div>
				<div>Nabucco</div>
				<div class="highlight">see more</div>
			</a>
		</li>
		<li>
			<a href="">
				<div class="highlight date">19 September</div>
				<div>Torino</div>
				<div>Nabucco</div>
				<div class="highlight">see more</div>
			</a>
		</li>
		<li>
			<a href="">
				<div class="highlight date">12 february</div>
				<div>Torino</div>
				<div>Nabucco</div>
				<div class="highlight">see more</div>
			</a>
		</li>
	</ul>
</section>


@endsection