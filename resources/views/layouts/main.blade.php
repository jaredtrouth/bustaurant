<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Jared Trouth">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="{{ mix('/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>The Bustaurant | @yield('title')</title>
</head>

<body data-spy="scroll" data-target="#nav" data-offset="50">
	@yield('header')
	@section('navbar')
	<nav class="navbar navbar-default navbar-static-top" id="nav" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collpse-main">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span><span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"><img src="/images/logo-plain.png"><span class="sr-only">The Bustaurant</span></a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse-main">
				<ul class="nav navbar-nav">
					<li><a href="/">Home</a></li>
					<li><a href="/about">About</a></li>
					<li><a href="/find">Where's the Bus?</a></li>
					<li><a href="/menu">Menu</a></li>
					<li><a href="/news">News</a></li>
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
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos ad blanditiis delectus, possimus voluptatibus veritatis sapiente, sit iusto saepe deleniti expedita! Molestiae minus cupiditate veniam ad alias veritatis nulla consectetur.
			</div>
		</footer>
		<script src="{{ mix('js/main.js') }}" charset="utf-8"></script>
		<script src="{{ mix('js/bus.js') }}" charset="utf-8"></script>
		@stack('scripts')
	</body>
	</html>
