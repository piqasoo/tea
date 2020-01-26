	<!-- DON'T FORGET TO UPDATE -->
	<?php 
		$description = isset($data->seo->description) ? strip_tags(str_limit($data->seo->description, 200)) : trans('texts.website_seo_description');
	?>
    <meta name="description" content="{{ $description }}"/>
    <meta name="keywords"  content="{{ isset($data->seo->keywords) ? $data->seo->keywords : trans('texts.website_seo_keywords') }}"/>
    <meta name="resource-type" content="document"/>

    <meta property="og:title" content="{{ isset($data->seo->title) ? $data->seo->title : trans('texts.website_seo_title') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ isset($data->seo->image) ? $data->seo->image : asset('/images/teapurtseladze.jpg') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <title>{{ isset($data->seo->title) ? $data->seo->title : trans('texts.website_seo_title') }}</title>