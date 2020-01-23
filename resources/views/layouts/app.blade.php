<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800,800i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <script src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script> -->
</head>
<body>
    <div id="app">
        <header>
            <div class="logo">
                <a href="{{ route('home') }}">TEA PURTSELADZE</a>
                <span>Soprano</span>
            </div>
            <nav class="">
                <ul>
                    <li class="{{ in_array($data->general->activeRoute, ['home']) ? 'active' : '' }}"><a href="{{ route('home') }}">{{ trans('texts.home') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['biography']) ? 'active' : '' }}"><a href="{{ route('biography') }}">{{ trans('texts.biography') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['press', 'article']) ? 'active' : '' }}"><a href="{{ route('press') }}">{{ trans('texts.press') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['review']) ? 'active' : '' }}"><a href="">{{ trans('texts.review') }}</a></li>
                    <li class="subs {{ in_array($data->general->activeRoute, ['events', 'event']) ? 'active' : '' }}"><a href="javascript:void(0)">{{ trans('texts.events') }}</a><i class="fa fa-arrow-down"></i>
                        <ul class="sub-nav">
                            <li><a href="{{ route('events', ['filter' => 'future']) }}">future events</a></li>
                            <li><a href="{{ route('events', ['filter' => 'passed']) }}">passed events</a></li>
                        </ul>
                    </li>
                    <li class="subs {{ in_array($data->general->activeRoute, ['galleryPhoto', 'galleryPhotoDetailed']) ? 'active' : '' }}"><a href="javascript:void(0)">{{ trans('texts.multimedia') }}</a><i class="fa fa-arrow-down"></i>
                        <ul class="sub-nav">
                            <li><a href="{{ route('galleryPhoto') }}">photo gallery</a></li>
                            <li><a href="">video gallery</a></li>
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
                    <a href="">ge</a>
                    <a href="">en</a>
                    <a href="">itl</a>
                </div>
                <div class="burger-menu">
                    <div></div>
                    <div></div>
                    <div></div>
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
                    <li class="{{ in_array($data->general->activeRoute, ['review']) ? 'active' : '' }}"><a href="">{{ trans('texts.review') }}</a></li>
                    <li class="subs {{ in_array($data->general->activeRoute, ['events', 'event']) ? 'active' : '' }}"><a href="javascript:void(0)">{{ trans('texts.events') }}</a><i class="fa fa-arrow-down"></i>
                        <ul class="sub-nav">
                            <li><a href="{{ route('events', ['filter' => 'future']) }}">future events</a></li>
                            <li><a href="{{ route('events', ['filter' => 'passed']) }}">passed events</a></li>
                        </ul>
                    </li>
                    <li class="subs {{ in_array($data->general->activeRoute, ['galleryPhoto', 'galleryPhotoDetailed']) ? 'active' : '' }}"><a href="javascript:void(0)">{{ trans('texts.multimedia') }}</a><i class="fa fa-arrow-down"></i>
                        <ul class="sub-nav">
                            <li><a href="{{ route('galleryPhoto') }}">photo gallery</a></li>
                            <li><a href="">video gallery</a></li>
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
                    <a href="">ge</a>
                    <a href="">en</a>
                    <a href="">itl</a>
                </div>
                <div class="burger-menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </header>
        <header class="header-mobile">
            <nav class="">
                <ul>
                    <li class="{{ in_array($data->general->activeRoute, ['home']) ? 'active' : '' }}"><a href="{{ route('home') }}">{{ trans('texts.home') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['biography']) ? 'active' : '' }}"><a href="{{ route('biography') }}">{{ trans('texts.biography') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['press', 'article']) ? 'active' : '' }}"><a href="{{ route('press') }}">{{ trans('texts.press') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['review']) ? 'active' : '' }}"><a href="">{{ trans('texts.review') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['events', 'event']) ? 'active' : '' }}"><a href="{{ route('events', ['filter' => 'future']) }}">{{ trans('texts.events') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['galleryPhoto', 'galleryPhotoDetailed']) ? 'active' : '' }}"><a href="{{ route('galleryPhoto') }}">{{ trans('texts.multimedia') }}</a></li>
                    <li class="{{ in_array($data->general->activeRoute, ['contact']) ? 'active' : '' }}"><a href="{{ route('contact') }}">{{ trans('texts.contact') }}</a></li>
                </ul>
            </nav>
            <div class="lang">
                <a href="">ge</a>
                <a href="">en</a>
                <a href="">itl</a>
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
