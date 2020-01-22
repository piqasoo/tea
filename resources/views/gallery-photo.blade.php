@extends('layouts.app')

@section('content')

@include('layouts.includes.pageBannerSecondary')
<?php $albums = $data->data->albums; ?>

<section class="gallery-photo-container">
	<section class="gallery-photo block center-container">
		<h2>Gallery <span>photo</span></h2>
		<h4>Albums</h4>
		@if(count($albums) > 0)
		<div class="gallery-photo-container">
			@foreach($albums as $album)
			<div class="albumn-container">
				<a href="{{ route('galleryPhotoDetailed', ['slug' => $album->slug, 'id' => $album->id ]) }}">
					<div class="albumn-img">
						<div class="img" style="background-image: url({{ asset('/uploads/photo_album/'.$album->image)  }})"></div>
		            </div>
		            
		            <div class="albumn-description">
		            	<h3>{{ $album->title }}</h3> <!----> 
		            	<small><i class="fa fa-search-plus"></i> {{ trans('texts.images') }}: {{ count($album->media) }}</small></div>
				</a>
	        </div>
	        @endforeach
		</div>
		@endif
		<!-- <div class="gallery-photo-container">
			<figure class="albumn-container">
	            <a class="" href="">
	                <div style="background-image: url('images/tea.jpg')"></div>
	                <img style="visibility: hidden;" class="img-fluid" src="images/tea.jpg">
	                <div class="shadow">
	                	<h3>albumn name</h3>
	                </div>
	            </a>
	        </figure>
	        <figure>
	            <a class="" data-fancybox="images" href="https://scontent.fgbb2-1.fna.fbcdn.net/v/t1.0-9/12295483_1061763120521973_299453508711310279_n.jpg?_nc_cat=111&_nc_ohc=l90Z3T_83AoAX-Xyn8m&_nc_ht=scontent.fgbb2-1.fna&oh=9629bd7c023686e156893cdc8fb16970&oe=5E922490" data-width="1536">
	            	<div style="background-image: url('https://scontent.fgbb2-1.fna.fbcdn.net/v/t1.0-9/12295483_1061763120521973_299453508711310279_n.jpg?_nc_cat=111&_nc_ohc=l90Z3T_83AoAX-Xyn8m&_nc_ht=scontent.fgbb2-1.fna&oh=9629bd7c023686e156893cdc8fb16970&oe=5E922490')"></div>
	                <img style="visibility: hidden;" class="img-fluid" src="https://scontent.fgbb2-1.fna.fbcdn.net/v/t1.0-9/12295483_1061763120521973_299453508711310279_n.jpg?_nc_cat=111&_nc_ohc=l90Z3T_83AoAX-Xyn8m&_nc_ht=scontent.fgbb2-1.fna&oh=9629bd7c023686e156893cdc8fb16970&oe=5E922490">
	            </a>
	        </figure>
	        <figure>
	            <a class="" data-fancybox="images" href="https://scontent.fgbb2-2.fna.fbcdn.net/v/t1.0-9/67490540_2598905286807741_8950423154342232064_o.jpg?_nc_cat=105&_nc_ohc=zhJH5d-dghcAX_hQtrf&_nc_ht=scontent.fgbb2-2.fna&oh=b99c7f3919f269d61ad39e55ca8f701e&oe=5EA3CA61" data-width="1536">
	                <div style="background-image: url('https://scontent.fgbb2-2.fna.fbcdn.net/v/t1.0-9/67490540_2598905286807741_8950423154342232064_o.jpg?_nc_cat=105&_nc_ohc=zhJH5d-dghcAX_hQtrf&_nc_ht=scontent.fgbb2-2.fna&oh=b99c7f3919f269d61ad39e55ca8f701e&oe=5EA3CA61')"></div>
	                <img style="visibility: hidden;" class="img-fluid" src="https://scontent.fgbb2-2.fna.fbcdn.net/v/t1.0-9/67490540_2598905286807741_8950423154342232064_o.jpg?_nc_cat=105&_nc_ohc=zhJH5d-dghcAX_hQtrf&_nc_ht=scontent.fgbb2-2.fna&oh=b99c7f3919f269d61ad39e55ca8f701e&oe=5EA3CA61">
	            </a>
	        </figure>
	        <figure>
	            <a class="" data-fancybox="images" href="https://scontent.fgbb2-2.fna.fbcdn.net/v/t31.0-8/10479360_807525362612418_6644362887306934277_o.jpg?_nc_cat=100&_nc_ohc=adiul0pyDHoAX_HMxmV&_nc_ht=scontent.fgbb2-2.fna&oh=00644f8e4e10b305b0d6cd2a3a443f18&oe=5EA73C40" data-width="1536">
	                <div style="background-image: url('https://scontent.fgbb2-2.fna.fbcdn.net/v/t31.0-8/10479360_807525362612418_6644362887306934277_o.jpg?_nc_cat=100&_nc_ohc=adiul0pyDHoAX_HMxmV&_nc_ht=scontent.fgbb2-2.fna&oh=00644f8e4e10b305b0d6cd2a3a443f18&oe=5EA73C40')"></div>
	                <img style="visibility: hidden;" class="img-fluid" src="https://scontent.fgbb2-2.fna.fbcdn.net/v/t31.0-8/10479360_807525362612418_6644362887306934277_o.jpg?_nc_cat=100&_nc_ohc=adiul0pyDHoAX_HMxmV&_nc_ht=scontent.fgbb2-2.fna&oh=00644f8e4e10b305b0d6cd2a3a443f18&oe=5EA73C40">
	            </a>
	        </figure>
	        <figure class="albumn-container">
	            <a class="" href="">
	                <div style="background-image: url('images/tea.jpg')"></div>
	                <img style="visibility: hidden;" class="img-fluid" src="images/tea.jpg">
	                <div class="shadow">
	                	<h3>albumn name</h3>
	                </div>
	            </a>
	        </figure>
	        <figure class="albumn-container">
	            <a class="" href="">
	                <div style="background-image: url('images/tea.jpg')"></div>
	                <img style="visibility: hidden;" class="img-fluid" src="images/tea.jpg">
	                <div class="shadow">
	                	<h3>albumn name</h3>
	                </div>
	            </a>
	        </figure>

		</div> -->
	</section>
</section>



@endsection