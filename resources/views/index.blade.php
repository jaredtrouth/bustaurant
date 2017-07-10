@extends('layouts.main')

@section('title', 'British Street Food')

@section('header')
	<header id="jumbotron" class="jumbotron">
		<div class="text-vcenter">
			<h1 class="shadowed">The Bustaurant</h1>
			<h3>Everything tastes better on a bus!</h3>
			<a class="btn btn-default btn-lg" id="about-btn" href="#about">Continue</a>
		</div>
	</header>
@endsection

@section('content')
	<div id="about" class="container">
		<div class="section-header text-center">
			<p class="lead"><strong><a href="/about">About</a></strong></p>
		</div>
		<div class="row">
			@include('partials.about')
		</div>
	</div>

	<div id="find" class="container-fluid">
		<div class="container">
			<div class="section-header text-center">
				<p class="lead text-inverse"><strong><a href="/find">Where's the Bus?</a></strong></p>
			</div>
			<div class="row">
				<div class="col-md-6 panel panel-default">
					<div class="panel-heading">Next Service</div>
					<div class="panel-body">
						@include('services.partials.next')
					</div>
				</div>
				<div class="col-md-4 col-md-offset-2 panel panel-default">
					<div class="panel-heading">Upcoming Services</div>
					<div class="panel-body">
						@include('services.partials.upcoming')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script>

	</script>
@endpush
