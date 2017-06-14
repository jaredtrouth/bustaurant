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
          <li><a href="#about">About</a></li>
          <li><a href="#find">Where's the Bus?</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#news">News</a>
          <li><a href="#contact">Follow the Bus</a></li>
        </ul>
      </div>
    </div>
  </nav>
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
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis aperiam excepturi animi obcaecati error perferendis aut explicabo adipisci autem praesentium nostrum, voluptatum iure voluptatem officiis sequi suscipit. Illum, doloribus, voluptates.
        </div>
      </div>
      <div class="col-md-4 col-md-offset-2 panel panel-default">
        <div class="panel-heading">Upcoming Services</div>
        <div class="panel-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum nisi error aut quod libero. Sunt assumenda pariatur obcaecati, saepe accusantium atque quia iste odit porro, repudiandae ipsam ratione incidunt. Odio.
        </div>
      </div>
    </div>
  </div>
@endsection