<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Jared Trouth">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="{{ mix('/css/style.css') }}">
	<link rel="stylesheet" href="{{ mix('/css/fullcalendar.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ mix('/css/jquery-ui.css') }}">

	<!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<script>
    window.Laravel = {!! json_encode([
        'csrfToken'=>csrf_token()
    ]) !!}
	</script>

	<title>The Bustaurant | @yield('title')</title>
</head>

<body>
	@yield('header')
	@section('navbar')
	<nav class="navbar navbar-default" id="nav" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-collapse-main">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span><span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"><img src="/images/logo-plain.png"><span class="sr-only">The Bustaurant</span></a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse-main">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}" title="Home">Home</a></li>
					<li><a href="{{ url('/about') }}" title="About">About</a></li>
					<li><a href="{{ url('/services') }}" title="Services">Where's the Bus?</a></li>
					<li><a href="{{ url('/menu') }}" title="Menu">Bus Fare</a></li>
					<li><a href="{{ url('/news') }}" title="News">News</a></li>
					<li><a href="{{ url('/catering') }}" title="Catering">Catering</a></li>
					<li><a href="{{ url('/contact') }}" title="Contact Us">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>
	@show

		<div class="content">
			@yield('content')
		</div>

		<footer class="footer">
			<div class="container">

				<div class="col-sm-8">
					<h3 class="text-center">It's Okay to be a Follower!</h3>
					<div class="row text-center social-icons">
						<a href="//www.facebook.com/thebustaurant"><img src="{{ asset('images/social-facebook.png') }}" class="img-responsive" alt="Facebook"></a>
						<a href="//www.instagram.com/bustaurant"><img src="{{ asset('images/social-instagram.png') }}" class="img-responsive" alt="Instagram"></a>
						<a href="//twitter.com"><img src="{{ asset('images/social-twitter.png') }}" class="img-responsive" alt="Twitter"></a>
						<a href="//flickr.com"><img src="{{ asset('images/social-flickr.png') }}" class="img-responsive" alt="Flickr"></a>
					</div>
				</div>

				<div class="col-sm-4 text-center" id="footer-nav">
				  <h3>The Bustaurant</h3>
					<ul class="nav">
						<li><a href="{{ url('/about') }}">About</a></li>
						<li><a href="{{ url('/services') }}">Services</a></li>
						<li><a href="{{ url('/menu') }}">Menu</a></li>
						<li><a href="{{ url('/news') }}">News</a></li>
						<li><a href="{{ url('/catering') }}" title="Catering">Catering</a></li>
						<li><a href="{{ url('/contact') }}" title="Contact Us">Contact</a></li>
					</ul>
				</div>
			</div>
		</footer>

		<div class="container" style="padding-top: 1rem;">
			<div class="col-xs-6">
				<p class="pull-left">Copyright &copy;2017 The Bustaurant</p>
			</div>
			<div class="col-xs-6">
				<p class="pull-right">Site design by <a href="//www.trouth.net">Trouth.Net</a></p>
			</div>
		</div>
		<script src="{{ mix('js/main.js') }}" charset="utf-8"></script>
		<script src="{{ mix('js/bus.js') }}" charset="utf-8"></script>
		@stack('scripts')
	</body>
	</html>
