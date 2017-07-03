@extends('layouts.main')

@section('title', 'British Street Food')

@section('header')
<header id="jumbotron" class="jumbotron">
	<div class="text-vcenter">
		<h1>The Bustaurant</h1>
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
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </div>

  <div id="find" class="container-fluid">
    <div class="container">
      <div class="section-header text-center">
        <p class="lead text-inverse"><strong><a href="/find">Where's the Bus?</a></strong></p>
      </div>
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
@endsection

@push('scripts')
<script>
/*Affix the navbar after scroll below header*/
$('#nav').affix({
  offset: {
    top: $('.jumbotron').height()+$('#nav').height()+96
  }
});
</script>
@endpush
