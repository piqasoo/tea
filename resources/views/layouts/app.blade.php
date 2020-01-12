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
                    <li><a href="">{{ trans('texts.home') }}</a></li>
                    <li><a href="">{{ trans('texts.biography') }}</a></li>
                    <li><a href="">{{ trans('texts.portfolio') }}</a></li>
                    <li><a href="">{{ trans('texts.review') }}</a></li>
                    <li><a href="">{{ trans('texts.events') }}</a></li>
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
                    <h3>Contact information</h3>
                    <ul>
                        <li>Via S. Giorgio, 4 - 40121 Bologna BO - Italy</li>
                        <li>Phone: +39 (051) 262126</li>
                        <li>Email: info@stagedoor.it</li>
                        <li class="social">
                            <a href="" class="social"><i class="fa fa-facebook"></i></a>
                            <a href="" class="social"><i class="fa fa-twitter"></i></a>
                            <a href="" class="social"><i class="fa fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3>Future events</h3>
                    <ul>
                        <li>
                            <span class="event-day">12</span> <span class="event-month">february</span>
                            <h5>event name</h5>
                        </li>
                        <li>
                            <span class="event-day">12</span> <span class="event-month">february</span>
                            <h5>event name</h5>
                        </li>
                        <li>
                            <span class="event-day">12</span> <span class="event-month">february</span>
                            <h5>event name</h5>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3>latest news</h3>
                    <ul>
                        <li>
                            <a href="">
                                <h5>Nabucco alle Terme di Caracalla, 25 Luglio 2017 ore 21:00</h5>
                                <span>27 december 2020</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <h5>Nabucco alle Terme di Caracalla, 25 Luglio 2017 ore 21:00</h5>
                                <span>27 december 2020</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <h5>Nabucco alle Terme di Caracalla, 25 Luglio 2017 ore 21:00</h5>
                                <span>27 december 2020</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
