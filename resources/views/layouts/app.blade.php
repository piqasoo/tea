<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800,800i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            <div class="logo">
                <a href="">TEA PURTSELADZE</a>
                <span>Soprano</span>
            </div>
            <nav class="">
                <ul>
                    <li><a href="{{ route('home') }}">{{ trans('texts.home') }}</a></li>
                    <li><a href="{{ route('biography') }}">{{ trans('texts.biography') }}</a></li>
                    <li><a href="">{{ trans('texts.press') }}</a></li>
                    <li><a href="">{{ trans('texts.review') }}</a></li>
                    <li><a href="{{ route('events', ['filter' => 'future']) }}">{{ trans('texts.events') }}</a></li>
                    <li><a href="">{{ trans('texts.multimedia') }}</a></li>
                    <li><a href="">{{ trans('texts.contact') }}</a></li>
                </ul>
            </nav>
            <div class="social-container">
                <div>
                    <a href="" class="social"><i class="fa fa-facebook"></i></a>
                </div>
                <div>
                    <a href="" class="social"><i class="fa fa-twitter"></i></a>
                </div>
                <div>
                    <a href="" class="social"><i class="fa fa-youtube"></i></a>
                </div>
                <div class="lang">
                    <a href="">ge</a>
                    <a href="">en</a>
                    <a href="">itl</a>
                </div>
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
                            <a href="{{ url('news/'.$footNews->slug.'/'.$footNews->id) }}">
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
</body>
</html>
