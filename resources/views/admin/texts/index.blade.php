@extends('admin.layouts.app')

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
                                <?php if($value['class'] == 'sidebar-header'): ?>
                                    <li class="sidebar-header">
                                        <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip"><i class="<?= $value['icon'] ? $value['icon'] : 'fa fa-folder-open' ?>"></i></a></span>
                                        <span class="sidebar-header-title"><?=$value['title']?></span>
                                    </li>
                                <?php else: ?>
                                <?php // if (in_array(Auth::user()->role, $value['roles'])): ?>
                                <li <?= Request::segment(2) == $value['namespace'] ? 'class="active"' : ''; ?>>
                                    <a href="/admin/<?=$value['link']?>">
                                        <i class="<?= $value['icon'] ? $value['icon'] : $value['class']?>"></i>
                                        <span class="sidebar-nav-mini-hide"><?=$value['title']?></span>
                                    </a>
                                </li>
                                <?php // endif ?>
                                <?php endif ?>
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
                        <!-- Datatables Header -->
                        <div class="content-header">
                          <div class="header-section">
                            <h1>
                              <i class="gi gi-leaf"></i>Texts<br><small>In this section you can modify text that are used in this application</small>
                            </h1>
                          </div>
                        </div>
                        <div class="row">
                            <div class="block full ">
                                <form class="form-horizontal form-bordered new-text" onsubmit="return AddText(event);">
                                    <input type="hidden" name="newText" value="true" class="form-control col-md-9">
                                    <div class="form-group">
                                        <div class="col-md-5">
                                            <label class="col-md-12">Write Key<span style="color:red">*</span></label>
                                            <input type="text" name="key" class="form-control col-md-9">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="col-md-12">Write Translation<span style="color:red">*</span></label>
                                            <input type="text" name="value" class="form-control col-md-9">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="col-md-12" style="visibility: hidden;">submit</label>
                                            <input type="submit" value="Add Text" class="form-control col-md-9 btn btn-primary waves-effect waves-themed btn-save">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="row">
                            <!-- Basic Form Elements Block -->
                            <div class="block full">
                              <!-- Basic Form Elements Title -->

                              <!-- Basic Form Elements Title -->
                              <div class="block-title">
                                  <h2>Choose appropriate <strong> language</strong></h2>
                              </div>
                              <ul class="nav nav-tabs">
                                    @foreach($data->langs as $key => $lang)
                                    <li {!! $key == 0 ? 'class = "active"' : "" !!}><a href="#tab_direction-{{$lang}}" data-toggle="tab">{!! $lang !!}</a></li>
                                    @endforeach
                              </ul><br/>

                              <div class="tab-content" style="overflow:visible!important">
                                @foreach($data->langs as $key => $lang)
                                <div class="tab-pane fade {!! $key == 0 ? 'active in' : '' !!} form-horizontal form-bordered" id="tab_direction-{{$lang}}">
                                    <table id="ecom-orders" class="table table-bordered table-striped table-vcenter dataTable no-footer" role="grid" aria-describedby="ecom-orders_info">
                                        <thead>
                                            <tr>
                                                <th>Key</th>
                                                <th><span class="text-primary">{{ strtoupper($lang) }}</span> translation</th>
                                                <th class="text-actions text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                                                <!-- @if($data->texts[$lang]) -->
                                            @foreach($data->texts[$lang] as $file => $text)
                                            @foreach($text as $key => $value)
                                            <?php $i++ ?>
                                            <tr class="lang-edit-col" data-id="tr-{{ $i }}">
                                                <td>
                                                    <div class="form-group">
                                                        <textarea class="form-control key-prop noneditable" readonly="">{{ $key }}</textarea>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <textarea name="text_value" class="form-control editable right-small">{{ $value }}</textarea>
                                                        <div class="saveDiv" style="display: none;">
                                                            <a href="javascript:void(0)" style="font-weight:bold" class="btn-save">save</a>&nbsp;&nbsp;&nbsp;
                                                                                    <a href="javascript:void(0)" class="btn-cancel">cancel</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-action-btn text-center">
                                                    <button class="btn btn-primary waves-effect waves-themed btn-save" data-lang="{{ $lang }}" data-group="{{ $file }}" data-key="{{ $key }}" data-value="{{ $value }}">
                                                        <span class="fa fa-check"></span>
                                                    </button>
                                                    <button class="btn btn-danger waves-effect waves-themed btn-remove" data-lang="{{ $lang }}" data-group="{{ $file }}" data-key="{{ $key }}" data-value="{{ $value }}">
                                                        <span class="fa fa-times"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endforeach
                                                                <!-- @endif -->
                                        </tbody>
                                    </table>

                                </div>
                                @endforeach
                              </div>

                              
                               
                              <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>

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
@push('scripts')
<script src="{{ asset('admin_resources/js/texts.js') }}"></script>
@endpush

