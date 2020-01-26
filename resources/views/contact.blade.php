@extends('layouts.app')

@section('seo')
@include('layouts.includes.seo', ['data'=> $data->data])
@endsection

@section('content')

@include('layouts.includes.pageBannerSecondary')

<div class="contact block">
	<section class="contact center-container">
		<h2>{{ trans('texts.write') }} <span>{{ trans('texts.message') }}</span></h2>
		<h4>{{ trans('texts.letter') }}</h4>
		<div class="contact-container center-container">
			<form @submit="checkForm"
		  	action="https://vuejs.org/"
		  	method="post">
				<div>
					<input v-bind:class="{ error: errors.name }" v-model="contact_form.name" type="text" name="name" placeholder="{{ trans('texts.form_name') }}">
					<input v-bind:class="{ error: errors.email }" v-model="contact_form.email" type="text" name="email" placeholder="{{ trans('texts.form_email') }}">
					<input v-bind:class="{ error: errors.phone }" v-model="contact_form.phone" type="text" name="phone" placeholder="{{ trans('texts.form_phone') }}">
				</div>
				<textarea v-model="contact_form.message" v-on:change="checkForm($event)" name="message" placeholder="{{ trans('texts.form_message') }}" rows="3"></textarea>
				<p v-if="errors.name && errors.visibility"><i class="fa fa-exclamation"></i> {{ trans('texts.name_is_required') }}</p>
				<p v-if="errors.email && errors.visibility"><i class="fa fa-exclamation"></i> {{ trans('texts.email_is_required') }}</p>
				<p v-if="errors.phone && errors.visibility"><i class="fa fa-exclamation"></i> {{ trans('texts.phone_is_required') }}</p>
				<p v-if="errors.message && errors.visibility"><i class="fa fa-exclamation"></i> {{ trans('texts.message_is_required') }}</p>
				<p v-if="errors.validEmail && errors.visibility && !errors.email"><i class="fa fa-exclamation"></i> {{ trans('texts.not_valid_email') }}</p>
				<p v-if="success" class="success">{{ trans('texts.message_sent') }}</p>
				<input class="btn-submit" type="submit" v-on:submit="checkForm($event)" value="{{ trans('texts.submit') }}">
			</form>
			<div class="contact-container center-container">
	</section>
</div>

@endsection