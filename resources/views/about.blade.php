@extends('layouts.main')

@section('title')
  About
@endsection

@section('header')
  <header id="jumbotron" class="about-jumbotron">
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
          <img id="map" style="height: 450px; width: 70%;margin-top:22px;" class="center-block"></img>
          <div id="infowindow-content">
            <div>
              <address>
                <i class="glyphicon glyphicon-map-marker"></i> <strong>{{ $nextservice->loc_name }}</strong><br />
                {{ $nextservice->loc_address }}
              </address>
              <i class="glyphicon glyphicon-calendar"></i> {{ $nextservice->starttime->format('l, F jS, Y') }}<br />
              <i class="glyphicon glyphicon-time"></i> {{ $nextservice->starttime->format('g:i A')}} - {{ $nextservice->endtime->format('g:i A')}}
            </div>
          </div>
          <div class="carousel-caption">
            <h1><a href="{{ url('service', $nextservice->id) }}" class="btn btn-lg btn-primary">Next Meal Service</a></h1>
          </address>
        </div>
      </div>

      <div class="item">
        <img src="{{ asset('images/food.jpg') }}" alt="..." style="max-height: 500px;" class="center-block">
        <div class="carousel-caption">
          <h1 class="shadowed">Check out our menu!</h1>
          <a href="{{ url('menu') }}" class="btn btn-lg btn-primary">View Menu</a>
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
  <div class="container" style="margin-top: 60px;margin-bottom: 22px;">
    <h1 class="text-center">About The Bustaurant</h1>
    @include('partials.about')
  </div>
@endsection

@push('scripts')
  <script>
  $(function() {
    resizeCarousel();
    $( window ).resize(function() {
      resizeCarousel();
    });
  });

  function resizeCarousel() {
    console.log('Resizing');
    $( '.carousel' ).height($( '#jumbotron' ).css('height'));
  }
  function initMap() {
    var location = { lat: {{ $nextservice->loc_lat }}, lng: {{ $nextservice->loc_long }} };
    var name = "{!! $nextservice->loc_name !!}";
    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);

    var map = new google.maps.Map(document.getElementById('map'), {
      center: location,
      zoom: 14,
      scrollwheel: false,
      mapTypeControl: true,
      mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.TOP_CENTER
      },
      zoomControl: true,
      zoomControlOptions: {
        // position: google.maps.ControlPosition.CENTER_TOP
      },

    });

    var marker = new google.maps.Marker({
      position: location,
      map: map,
      title: name
    });

    infowindowContent.style.display = 'block';
    infowindow.open(map, marker);

  }

  $('.carousel').carousel({
    interval: 10000,
    pause: "hover"
  })
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAclc0sDq9Nkrb-NcAqCjwQLQuXvnT5EjE&callback=initMap">
  </script>
@endpush
