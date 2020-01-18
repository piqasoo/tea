@extends('layouts.app')

@section('content')

@include('layouts.includes.pageBannerSecondary')

<div class="contact center-container page-content">
	<section class="contact block">
		<h2>write <span>message</span></h2>
		<h4>letter</h4>
		<div class="contact-container center-container">
			<form action="" method="POST">
				<div>
					<input type="text" name="name" placeholder="name">
					<input type="text" name="email" placeholder="email">
					<input type="text" name="phone" placeholder="phone">
				</div>
				<textarea name="message" placeholder="message" rows="3"></textarea>
				<p class="succes" style="display: none"><span>Contgrats!</span> letter succesfully send!</p>
				<p class="error" style="display: none"><span>Opps..</span> there was problem!</p>
				<input type="submit" name="submit">
			</form>
		</div>
	</section>
</div>

@endsection