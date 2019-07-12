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
    
    <script src="{{ asset('js/libs/jquery/jquery-1.11.2.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/jquery/jquery-migrate-1.2.1.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/bootstrap/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/spin.js/spin.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/autosize/jquery.autosize.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/moment/moment.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/flot/jquery.flot.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/flot/jquery.flot.time.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/flot/jquery.flot.resize.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/flot/jquery.flot.orderBars.js') }}" defer></script>
    <script src="{{ asset('js/libs/flot/jquery.flot.pie.js') }}" defer></script>
    <script src="{{ asset('js/libs/flot/curvedLines.js') }}" defer></script>
    <script src="{{ asset('js/libs/jquery-knob/jquery.knob.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/sparkline/jquery.sparkline.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/nanoscroller/jquery.nanoscroller.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/d3/d3.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/d3/d3.v3.js') }}" defer></script>
    <script src="{{ asset('js/libs/rickshaw/rickshaw.min.js') }}" defer></script>
    <script src="{{ asset('js/core/source/App.js') }}" defer></script>
    <script src="{{ asset('js/core/source/AppNavigation.js') }}" defer></script>
    <script src="{{ asset('js/core/source/AppOffcanvas.js') }}" defer></script>
    <script src="{{ asset('js/core/source/AppCard.js') }}" defer></script>
    <script src="{{ asset('js/core/source/AppForm.js') }}" defer></script>
    <script src="{{ asset('js/core/source/AppNavSearch.js') }}" defer></script>
    <script src="{{ asset('js/core/source/AppVendor.js') }}" defer></script>
    <script src="{{ asset('js/core/demo/Demo.js') }}" defer></script>
	<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}" defer></script>
	<script src="{{ asset('js/libs/toastr/toastr.js') }}" defer></script>
	<script src="{{ asset('js/core/demo/DemoUIMessages.js') }}" defer></script>
    <script src="{{ asset('js/app/main.js') }}" defer></script>

    <!-- Fonts -->
    <link href="{{ asset('http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900') }}">

    <!-- Styles -->
    
    <link href="{{ asset('css/theme-default/bootstrap.css?1422792965') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-default/materialadmin.css?1425466319') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-default/font-awesome.min.css?1422529194') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-default/material-design-iconic-font.min.css?1421434286') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-default/libs/rickshaw/rickshaw.css?1422792967') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-default/libs/morris/morris.core.css?1420463396') }}" rel="stylesheet">
	<link href="{{ asset('css/theme-default/libs/toastr/toastr.css?1425466569') }}" rel="stylesheet">
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body class="menubar-hoverable header-fixed">
    <!-- BEGIN HEADER-->
		<header id="header" >
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="/home">
									<span class="text-lg text-bold text-primary">{{ App\Institution::name() }}</span>
								</a>
							</div>
						</li>
						<li>
							<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
								<i class="fa fa-bars"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="headerbar-right">
					<ul class="header-nav header-nav-options">
						<li>
							<!-- Search form -->
							<form class="navbar-search" role="search">
								<div class="form-group">
									<input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
								</div>
								<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
							</form>
                        </li>
                        
                        
						<li class="dropdown hidden-xs">
							<a id="notify" href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
								<i class="fa fa-bell"></i><sup id="notifications_count" class="badge style-danger">{{App\Notifications::getMessagesCount(Auth::user()->id)}}</sup>
							</a>
							<ul id="notification_list" class="dropdown-menu animation-expand">
							@include('modules.notifications.dropdownlist')
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
                        
						
					</ul><!--end .header-nav-options -->
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<span class="profile-info">
                                    {{ Auth::user()->lastname }} {{ Auth::user()->firstname }}
									<small>{{ Lang::choice('vocabulary.'.Auth::user()->role(), 1) }}</small>
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
                                <li><a href="../../html/pages/profile.html">My profile</a></li>
								<li class="dropdown-header">{{ __('vocabulary.language') }}</li>
                                @foreach($locales as $locale)
                                    <li><a href="setlocale/{{$locale}}">{{__('vocabulary.'.$locale)}}</a></li>
                                @endforeach
								<li class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fa fa-fw fa-power-off text-danger"></i>{{ __('vocabulary.logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
					
				</div><!--end #header-navbar-collapse -->
			</div>
		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS DEMO LEFT -->
			<div class="offcanvas">				
				<div id="offcanvas-demo-left" class="offcanvas-pane width-6" style="">
					<div class="offcanvas-head">
						<header>Left off-canvas</header>
						<div class="offcanvas-tools">
							<a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
								<i class="md md-close"></i>
							</a>
						</div>
					</div>
					<div class="nano has-scrollbar" style="height: 805px;">
						<div class="nano-content" tabindex="0" style="right: -17px;">
							<div class="offcanvas-body">
								...
							</div>
						</div>
						<div class="nano-pane" style="display: none;">
							<div class="nano-slider" style="height: 788px; transform: translate(0px, 0px);">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END OFFCANVAS DEMO LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>

					<div class="section-header h-5">
						<ol class="breadcrumb">
							@if ($active_module != 'home')
							<li><a href="/home">{{ __('vocabulary.home') }}</a></li>
								@if (isset($active_group))
								<li>{{ __( 'vocabulary.'.$active_group) }}</li>
								@endif
							<li class="active">{{ __( 'vocabulary.'.$active_module) }}</li>
							@endif
						</ol>
					</div>

					<div id="section_content_of_module" class="section-body mt-0">
                        @yield('content')
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="/home">
							<span class="text-lg text-bold text-primary ">{{ App\Institution::name() }}</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
							@if ($active_module == 'home')
							<a href="/home" class="active">
							@else
							<a href="/home">
							@endif							
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">{{ __('vocabulary.home') }}</span>
							</a>
						</li><!--end /menu-li -->
                        <!-- END DASHBOARD -->
                        
						@foreach(Auth::user()->groupsModules() as $key => $value)
                        
							@if (is_int($key))
							<li class="gui-folder">
								@if ($active_group == (new App\GroupModules)->getName($key))
								<a class="active">
								@else
								<a>
								@endif
									<div class="gui-icon"><i class="{{ (new App\GroupModules)->getFontIcon($key) }}"></i></div>
									<span class="title">{{ __( 'vocabulary.'.(new App\GroupModules)->getName($key) ) }}</span>
								</a>
								<!--start submenu -->
								<ul>
								@foreach($value as $module)
									<li>
										<a href="{{ $module->name }}">
											<span class="title">{{ __('vocabulary.'.$module->name) }}</span>
										</a>
									</li>								
								@endforeach
								</ul>
							</li>
							@else
								@foreach($value as $module)
								<li>							
									@if ($active_module == $module->name)
										<a href="{{ $module->name }}" class="active">
									@else
										<a href="{{ $module->name }}">
									@endif
											<div class="gui-icon"><i class="md {{ $module->font_icon }}"></i></div>
											<span class="title">{{ __('vocabulary.'.$module->name) }}</span>
									</a>
								</li>
								@endforeach
							@endif
                        @endforeach

					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong>
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->

			<!-- BEGIN OFFCANVAS RIGHT -->
			<div class="offcanvas">

				@include('layouts.confirm')
				
				@yield('offcanvas')

			</div>
			<!-- ENDOFFCANVAS RIGHT -->
		
		</div><!--end #base-->
		<!-- END BASE -->
</body>
</html>
