@extends('layouts.app')

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@foreach(Config::get('app.locales') as $lang)

	@section('urlPath_'.$lang)
	contact
	@endsection

@endforeach

@section('content')

@include('layouts.includes.pageBannerSecondary')

<div class="contact block">
	<section class="contact center-container">
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
						
						<p :class="[errors.grecaptcha && !contact_form.grecaptcha ? errorClass : '']"><i class="fa fa-exclamation"></i> {{ trans('texts.not_valid_security_code') }}</p>
						<p :class="[success ? errorClass : '']">{{ trans('texts.message_sent') }}</p>
						<!-- <recaptcha-component></recaptcha-component> -->
						<vue-recaptcha sitekey="6LcMKtQUAAAAAKqFfPfcOJndlXWaw6XicIx_mYiP" :loadRecaptchaScript="true"></vue-recaptcha>
						<input class="btn-submit" type="submit" v-on:submit="checkForm($event)" value="{{ trans('texts.submit') }}">
					</form>
			<div class="contact-container center-container">
	</section>
</div>

@endsection