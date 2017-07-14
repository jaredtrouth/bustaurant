@extends('layouts.main')

@section('title', 'British Street Food')

@section('header')
  <header id="jumbotron" class="jumbotron">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">

        <div class="item active">
            <img src="{{ asset('images/Bustaurant_tire_art_place_setting.jpg')}}" alt="Serving Fine Bus Fare" class="center-block" style="max-height: 500px;margin: auto">
          {{-- <div class="carousel-caption">
            <h1></h1>
              <a href="{{ url('service', $nextservice->id) }}" class="btn btn-lg btn-primary">Next Meal Service</a>
        </div> --}}
      </div>

      <div class="item">
        <img src="{{ asset('images/food.jpg') }}" alt="..." style="max-height: 500px;" class="center-block">
        <div class="carousel-caption">
          <h1 class="shadowed">{{ title_case('Enjoy the finest street food') }}</h1>
          <div class="col-xs-3 col-xs-offset-1"><a href="{{ url('services') }}" class="btn btn-lg btn-primary">Meal Services</a></div>
          <div class="col-xs-3 col-xs-offset-4"><a href="{{ url('menu') }}" class="btn btn-lg btn-primary">View Menu</a></div>
        </div>
      </div>

      <div class="item">
        <img src="{{ asset('images/catering.jpg') }}" alt="" style="max-height: 500px;" class="center-block">
        <div class="carousel-caption">
          <h1 class="shadowed">Let us cater your event!</h1>
          <a href="{{ url('catering') }}" class="btn btn-lg btn-primary">Catering</a>
        </div>
      </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
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
