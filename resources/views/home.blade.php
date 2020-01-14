@extends('layouts.app')

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
	<h2>Future <span>events</span></h2>
	<h4>events</h4>
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
<section class="gallery-photo block block-dark">
	<h2>Gallery <span>photo</span></h2>
	<h4>photo</h4>
	<div class="gallery-photo-container">
		<figure>
            <a class="" data-fancybox="images" href="images/tea.jpg" data-width="1536">
                <div style="background-image: url('images/tea.jpg')"></div>
                <img style="visibility: hidden;" class="img-fluid" src="images/tea.jpg">
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

	</div>
	<div class="see-more">
     	<a href="">see more</a>
    </div>
</section>
<section class="gallery-video block">
	<h2>Gallery <span>video</span></h2>
	<h4>video</h4>
	<div class="gallery-video-container center-container">
		<div>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/1qexU71YMCU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/_uKbAP6ehNo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
	<div class="see-more">
     	<a href="">see more</a>
    </div>
</section>
<section class="reviews block block-dark">
	<h2>What do <span>thay say</span></h2>
	<h4>REVIEWS</h4>
	<div class="reviews-container center-container">
		<blockquote cite="">
			<p>go through anything. You read and you’re pierced.</p>
			<footer>—Aldous Huxley, <cite>Brave New World</cite></footer>
		</blockquote>
		<blockquote cite="">
			<p>Words can be like X-rays, if you use them properly—they’ll go through anything. You read and you’re pierced.</p>
			<footer>—Aldous Huxley, <cite>Brave New World</cite></footer>
		</blockquote>
		<blockquote cite="">
			<p>Words can be like X-rays, if you use them properly—they’ll.</p>
			<footer>—Aldous Huxley, <cite>Brave New World</cite></footer>
		</blockquote>
	</div>
	<div class="see-more">
     	<a href="">see more</a>
    </div>
</section>
<section class="news block ">
	<h2>latest <span>articles</span></h2>
	<h4>press</h4>
	<div class="news-container center-container">
		<article>
			<div><a href=""><img src="https://source.unsplash.com/IbLZjKcelpM/416x350"></a></div>
			<h3><a href="">CONCERTO “LE VIE DELL’AMICIZIA”- VENERDÌ 21 LUGLIO, RAI1 ALLE 23H35</a></h3>
			<h4>27 february 2020</h4>
			<div class="see-more">
		     	<a href="">see more</a>
		    </div>
		</article>
		<article>
			<div><a href=""><img src="https://source.unsplash.com/IbLZjKcelpM/416x350"></a></div>
			<h3><a href="">CONCERTO “LE VIE DELL’AMICIZIA”- VENERDÌ 21 LUGLIO, RAI1 ALLE 23H35</a></h3>
			<h4>27 february 2020</h4>
			<div class="see-more">
		     	<a href="">see more</a>
		    </div>
		</article>
		<article>
			<div><a href=""><img src="https://source.unsplash.com/IbLZjKcelpM/416x350"></a></div>
			<h3><a href="">CONCERTO “LE VIE DELL’AMICIZIA”- VENERDÌ 21 LUGLIO, RAI1 ALLE 23H35</a></h3>
			<h4>27 february 2020</h4>
			<div class="see-more">
		     	<a href="">see more</a>
		    </div>
		</article>
	</div>
	<div class="see-more">
     	<a href="">see more</a>
    </div>
</section>
<section class="contact block block-dark-secondary">
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
@endsection
