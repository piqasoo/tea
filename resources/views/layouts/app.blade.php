<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO -->
    @yield('seo')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800,800i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bpg-nateli-mtavruli.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bpg-nino-elite-cond-caps.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bpg-ingiri-arial.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/alk-rex-bold.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gugeshashvili-rachveli.min.css') }}">
    <!-- <script src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script> -->
    <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
</script> 
</head>
<body class="{{ str_replace('_', '-', app()->getLocale()) }}">
<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=927234504005569";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
    <div id="app">
        <header class="header">
            <div class="logo">
                <a href="{{ route('home') }}">TEA PURTSELADZE</a>
                <span>Soprano</span>
            </div>
            <nav class="">
                <ul>
                    <li class="{{ in_array($data->general->activeRoute, ['home']) ? 'active' : '' }}"><a href="{{ route('home') }}">{{ trans('texts.home') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['biography']) ? 'active' : '' }}"><a href="{{ route('biography') }}">{{ trans('texts.biography') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['press', 'article']) ? 'active' : '' }}"><a href="{{ route('press') }}">{{ trans('texts.press') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['reviews']) ? 'active' : '' }}"><a href="{{ route('reviews') }}">{{ trans('texts.review') }}</a></li>
                    <li class="subs {{ in_array($data->general->activeRoute, ['events', 'event']) ? 'active' : '' }}"><a href="javascript:void(0)">{{ trans('texts.events') }}</a><i class="fa fa-angle-down"></i>
                        <ul class="sub-nav">
                            <li><a href="{{ route('events', ['filter' => 'future']) }}">future events</a></li>
                            <li><a href="{{ route('events', ['filter' => 'passed']) }}">passed events</a></li>
                        </ul>
                    </li>
                    <li class="subs {{ in_array($data->general->activeRoute, ['galleryPhoto', 'galleryPhotoDetailed','galleryVideo', 'galleryVideoDetailed']) ? 'active' : '' }}"><a href="javascript:void(0)">{{ trans('texts.multimedia') }}</a><i class="fa fa-angle-down"></i>
                        <ul class="sub-nav">
                            <li><a href="{{ route('galleryPhoto') }}">photo gallery</a></li>
                            <li><a href="{{ route('galleryVideo') }}">video gallery</a></li>
                        </ul>
                    </li>
                    <li class="{{ in_array($data->general->activeRoute, ['contact']) ? 'active' : '' }}"><a href="{{ route('contact') }}">{{ trans('texts.contact') }}</a></li>
                </ul>
            </nav>
            <div class="social-container">
                @if($data->general->contact->facebook)
                <div>
                    <a href="{{$data->general->contact->facebook}}" class="social"><i class="fa fa-facebook"></i></a>
                </div>
                @endif
                @if($data->general->contact->twitter)
                <div>
                    <a href="{{$data->general->contact->twitter}}" class="social"><i class="fa fa-twitter"></i></a>
                </div>
                @endif
                @if($data->general->contact->youtube)
                <div>
                    <a href="{{$data->general->contact->youtube}}" class="social"><i class="fa fa-youtube"></i></a>
                </div>
                @endif
                <div class="lang">
                    @foreach(Config::get('app.locales') as $lang)
                        <a href="{{ Config::get('app.url').'/'.$lang.'/' }}@yield('urlPath_'.$lang)" class="{{ app()->getLocale() == $lang ? 'active' : '' }}">{{ $lang }}</a>
                    @endforeach
                </div>
                <div class="burger-menu">
                    <div class="first-child"></div>
                    <div class="second-child"></div>
                    <div class="third-child"></div>
                </div>
            </div>
        </header>
        <header class="header-fixed">
            <div class="logo">
                <a href="{{ route('home') }}">TEA PURTSELADZE</a>
                <span>Soprano</span>
            </div>

            <nav class="">
                <ul>
                    <li class="{{ in_array($data->general->activeRoute, ['home']) ? 'active' : '' }}"><a href="{{ route('home') }}">{{ trans('texts.home') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['biography']) ? 'active' : '' }}"><a href="{{ route('biography') }}">{{ trans('texts.biography') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['press', 'article']) ? 'active' : '' }}"><a href="{{ route('press') }}">{{ trans('texts.press') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['reviews']) ? 'active' : '' }}"><a href="{{ route('reviews') }}">{{ trans('texts.review') }}</a></li>
                    <li class="subs {{ in_array($data->general->activeRoute, ['events', 'event']) ? 'active' : '' }}"><a href="javascript:void(0)">{{ trans('texts.events') }}</a><i class="fa fa-angle-down"></i>
                        <ul class="sub-nav">
                            <li><a href="{{ route('events', ['filter' => 'future']) }}">future events</a></li>
                            <li><a href="{{ route('events', ['filter' => 'passed']) }}">passed events</a></li>
                        </ul>
                    </li>
                    <li class="subs {{ in_array($data->general->activeRoute, ['galleryPhoto', 'galleryPhotoDetailed','galleryVideo', 'galleryVideoDetailed']) ? 'active' : '' }}"><a href="javascript:void(0)">{{ trans('texts.multimedia') }}</a><i class="fa fa-angle-down"></i>
                        <ul class="sub-nav">
                            <li><a href="{{ route('galleryPhoto') }}">photo gallery</a></li>
                            <li><a href="{{ route('galleryVideo') }}">video gallery</a></li>
                        </ul>
                    </li>
                    <li class="{{ in_array($data->general->activeRoute, ['contact']) ? 'active' : '' }}"><a href="{{ route('contact') }}">{{ trans('texts.contact') }}</a></li>
                </ul>
            </nav>
            <div class="social-container">
                @if($data->general->contact->facebook)
                <div>
                    <a href="{{$data->general->contact->facebook}}" class="social"><i class="fa fa-facebook"></i></a>
                </div>
                @endif
                @if($data->general->contact->twitter)
                <div>
                    <a href="{{$data->general->contact->twitter}}" class="social"><i class="fa fa-twitter"></i></a>
                </div>
                @endif
                @if($data->general->contact->youtube)
                <div>
                    <a href="{{$data->general->contact->youtube}}" class="social"><i class="fa fa-youtube"></i></a>
                </div>
                @endif
                <div class="lang">
                    @foreach(Config::get('app.locales') as $lang)
                        @if(app()->getLocale() == $lang)
                        <a href="{{ url()->current() }}" class="active">{{ $lang }}</a>
                        @else
                        <a href="{{ str_replace('/'.app()->getLocale().'/', '/'.$lang.'/', url()->current()) }}">{{ $lang }}</a>
                        @endif
                    @endforeach
                </div>
                <div class="burger-menu">
                    <div class="first-child"></div>
                    <div class="second-child"></div>
                    <div class="third-child"></div>
                </div>
            </div>
        </header>
        <header class="header-mobile">
            <nav class="">
                <ul>
                    <li class="{{ in_array($data->general->activeRoute, ['home']) ? 'active' : '' }}"><a href="{{ route('home') }}">{{ trans('texts.home') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['biography']) ? 'active' : '' }}"><a href="{{ route('biography') }}">{{ trans('texts.biography') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['press', 'article']) ? 'active' : '' }}"><a href="{{ route('press') }}">{{ trans('texts.press') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['reviews']) ? 'active' : '' }}"><a href="{{ route('reviews') }}">{{ trans('texts.review') }}</a></li>
                    <li class="subs {{ in_array($data->general->activeRoute, ['events', 'event']) ? 'active' : '' }}"><a href="javascript:void(0)">{{ trans('texts.events') }}</a><i class="fa fa-caret-right"></i>
                        <ul class="sub-nav">
                            <li><a href="{{ route('events', ['filter' => 'future']) }}">future events</a></li>
                            <li><a href="{{ route('events', ['filter' => 'passed']) }}">passed events</a></li>
                        </ul>
                    </li>
                    <li class="subs {{ in_array($data->general->activeRoute, ['galleryPhoto', 'galleryPhotoDetailed']) ? 'active' : '' }}"><a href="javascript:void(0)">{{ trans('texts.multimedia') }}</a><i class="fa fa-caret-right"></i>
                        <ul class="sub-nav">
                            <li><a href="{{ route('galleryPhoto') }}">photo gallery</a></li>
                            <li><a href="{{ route('galleryVideo') }}">video gallery</a></li>
                        </ul>
                    </li>
                    <li class="{{ in_array($data->general->activeRoute, ['contact']) ? 'active' : '' }}"><a href="{{ route('contact') }}">{{ trans('texts.contact') }}</a></li>
                </ul>
            </nav>
            <div class="lang">
                    @foreach(Config::get('app.locales') as $lang)
                        <a href="{{ str_replace('/'.app()->getLocale().'/', '/'.$lang.'/', url()->current()) }}" class="{{app()->getLocale() == $lang ? 'active' : ''}}">{{ $lang }}</a>

                    @endforeach
            </div>
        </header>

        <main>
            @yield('content')
        </main>
        <footer class="footer">
            <div class="center-container">   
                <div>
                    <h3>{{ trans('texts.contact_information') }}</h3>
                    <ul>
                        @if($data->general->contact->mail_01)
                        <li>{{ trans('texts.email') }}: {{ $data->general->contact->mail_01 }}</li>
                        @endif
                        @if($data->general->contact->manager)
                        <li>{{ trans('texts.manager') }}: {{ $data->general->contact->manager }}</li>
                        @endif
                        @if($data->general->contact->manager && $data->general->contact->mail_02)
                        <li>{{ trans('texts.manager_email') }}: {{ $data->general->contact->mail_02 }}</li>
                        @endif
                        <li class="social">
                            @if($data->general->contact->facebook)
                            <a href="{{$data->general->contact->facebook}}" class="social"><i class="fa fa-facebook"></i></a>
                            @endif
                            @if($data->general->contact->twitter)
                            <a href="{{$data->general->contact->twitter}}" class="social"><i class="fa fa-twitter"></i></a>
                            @endif
                            @if($data->general->contact->youtube)
                            <a href="{{$data->general->contact->youtube}}" class="social"><i class="fa fa-youtube"></i></a>
                            @endif
                        </li>
                    </ul>
                </div>
                @if(isset($data->general) && isset($data->general->events) && !empty($data->general->events))
                <div>
                    <h3>{{ trans('texts.future_events') }}</h3>
                    <ul>
                        @foreach($data->general->events as $footEvent)
                        <?php 
                            $day = \Carbon\carbon::parse($footEvent->date)->format('d');
                            $month = \Carbon\carbon::parse($footEvent->date)->format('F');
                        ?>
                        <li>
                            <a href="{{ url('events/'.$footEvent->slug.'/'.$footEvent->id) }}">
                                <span class="event-day">{{ $day }}</span> <span class="event-month">{{ trans('texts.'.$month) }}</span>
                                <h5>{{ $footEvent->name }}</h5>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(isset($data->general) && isset($data->general->news) && !empty($data->general->news))
                <div>
                    <h3>{{ trans('texts.latest_news') }}</h3>
                    <ul>
                        @foreach($data->general->news as $footNews)
                        <?php 
                            $day = \Carbon\carbon::parse($footNews->date)->format('d');
                            $month = \Carbon\carbon::parse($footNews->date)->format('F');
                            $year = \Carbon\carbon::parse($footNews->date)->format('Y');
                        ?>
                        <li>
                            <a href="{{ url('press/'.$footNews->slug.'/'.$footNews->id) }}">
                                <h5>{{ $footNews->title_01 }}</h5>
                                <span>{{$day}} {{ trans('texts.'.$month) }} {{$year}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </footer>
    </div>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
