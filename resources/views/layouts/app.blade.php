<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="mobile-web-app-capable" content="yes" />		
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LEOCORP') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="Virtual Tour, 3D Building Construction, VR">
    <meta name="author" content="Ephson E. Guakro">
    <meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" -->
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}" type="image/x-icon">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
    <!--Load for construction page only -->
	
</head>
<body class="container-fluid" lj-type="stage" id="mainstage">
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/images/logo.png') }}">
                        {{ config('app.name', 'LEOCORP') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        	<li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
	                                @if ( Auth::user()->is_admin)
	                                	<li><a href="{{ url('ctrlpanel') }}">Control Panel</a></li>
	                                @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @if (session()->has('flash_message'))
	        <div class="alert alert-{{ session('flash_message_level') }}">
		        <button type="button" class="close" data-dismiss="alert">×</button>
	            {{ session('flash_message') }}
	        </div>
		@endif
		
		@if (count($errors))
			<div class="alert alert-warning">
		        <button type="button" class="close" data-dismiss="alert">×</button>
	            <ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
	        </div>
		@endif
		
        <section>
			<header class="header row">
	        	<a href="/"><img src="/images/header.png"/></a>
	    	</header>
	    	<br>
	    	
			@yield('content')
			@include('layouts.footer')
        </section>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.cycle2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.cycle2.carousel.min.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}" type="text/javascript"></script>
    @yield('scripts')
    
</body>
</html>
