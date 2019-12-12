@extends('admin.layouts.app')

@section('content')

		<div id="page-wrapper">
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie10"></div>
                </div>
            </div>


            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
                <div id="sidebar">
                    <div id="sidebar-scroll">
                        <div class="sidebar-content">
                            <a href="" class="sidebar-brand">
                                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>{{ env('APP_NAME') }}</strong> CMS</span>
                            </a>

                            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                                <div class="sidebar-user-name">Admin: {{ Auth::user()->name }}</div>
                                <div class="sidebar-user-links">
                                  	<span>
										<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout<i class="gi gi-exit"></i>
										</a>

	                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                            {{ csrf_field() }}
	                                    </form>
                                	</span>
                                </div>
                            </div>

                            <ul class="sidebar-nav">
                                <li class="sidebar-header">
                                    <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a><a href="javascript:void(0)" data-toggle="tooltip" title="Create the most amazing pages with the widget kit!"><i class="gi gi-lightbulb"></i></a></span>
                                    <span class="sidebar-header-title">MENU</span>
                                </li>
                                <?php foreach (Config::get('adminMenu') as $key => $value): ?>
                                <?php // if (in_array(Auth::user()->role, $value['roles'])): ?>
                                <li <?= Request::segment(2) == $value['namespace'] ? 'class="active"' : ''; ?>>
                                    <a href="/admin/<?=$value['link']?>">
                                        <i class="<?=$value['class']?>"></i>
                                        <span class="sidebar-nav-mini-hide"><?=$value['title']?></span>
                                    </a>
                                </li>
                                <?php // endif ?>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="main-container">
                    <header class="navbar navbar-inverse">
                        <ul class="nav navbar-nav-custom">
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-bars fa-fw"></i>
                                </a>
                            </li>
                        </ul>
                    </header>

                    <div id="page-content">
                      <div class="wrapper">
                      	@include($data->template, ['data' => $data])
                      </div>
                    </div>

                    <footer class="clearfix">
                        <div class="pull-right"></div>
                        <div class="pull-left">
                            <span id="year"></span> &copy; <a href="#">Copiryght by Danarti {!! date('Y') !!}</a>
                            <!--Created at 2017 -->
                        </div>
                    </footer>

                </div>
            </div>
        </div>

@endsection