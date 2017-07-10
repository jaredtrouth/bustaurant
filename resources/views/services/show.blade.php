@extends('layouts.main')

@section('title')
  {{ $service->loc_name }} - {{ $service->starttime->format('F jS, Y \\@ g:i A')}}
@endsection

@section('header')
  <header id="jumbotron" class="jumbotron-service">
    <div id="map"></div>
    <div id="infowindow-content">
      <div>
        <address>
          <i class="glyphicon glyphicon-map-marker"></i> <strong>{{ $service->loc_name }}</strong><br />
          {{ $service->loc_address }}
        </address>
        <i class="glyphicon glyphicon-calendar"></i> {{ $service->starttime->format('l, F jS, Y') }}<br />
        <i class="glyphicon glyphicon-time"></i> {{ $service->starttime->format('g:i A')}} - {{ $service->endtime->format('g:i A')}}
      </div>
    </div>
  </header>
@endsection

@section('content')
  <div class="container">

    <div class="col-lg-5 col-md-5 col-sm-6">
      <h1>{{ $service->starttime->toDayDateTimeString() }}</h1>
      <address>
        <strong>{{ $service->loc_name }}</strong><br>
        {{ $service->loc_address }}
      </address>
      <br>

      <form class="form-inline" action="#" method="get">
        <div class="form-group">
          <input type="text" class="form-control" id="origin" placeholder="Starting point">
        </div>
        <button type="button" class="btn btn-primary" id="dirButton">
          Get Directions
        </button>
      </form>
    </div>

    <div id="directions-panel" class="col-lg-4 col-md-4 col-sm-6" style="overflow-y: scroll;">

    </div>

    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Upcoming Services</h3>
        </div>
        <div class="panel-body">
          @include('services.partials.upcoming')
        </div>
      </div>
    </div>

  </div>
@endsection

@push('scripts')
  <script>
  var directionsService;
  var directionsDisplay;

  function initMap() {
    var location = { lat: {{ $service->loc_lat }}, lng: {{ $service->loc_long }} };
    var name = "{!! $service->loc_name !!}";
    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);

    var map = new google.maps.Map(document.getElementById('map'), {
      center: location,
      zoom: 14,
      scrollwheel: false,
    });

    var marker = new google.maps.Marker({
      position: location,
      map: map,
      title: name
    });

    infowindowContent.style.display = 'block';
    infowindow.open(map, marker);
    map.panBy(0, -50);

    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer({
      draggable: true,
      map: map,
      panel: document.getElementById('directions-panel')
    });

    directionsDisplay.addListener('directions_changed', function() {
      computeTotalDistance(directionsDisplay.getDirections());
    });

    $( '#dirButton' ).click(function() {
      var origin = $( '#origin' ).val();
      displayRoute(origin, location, directionsService, directionsDisplay);
    })

  }

  function displayRoute(origin, destination, service, display) {
    service.route({
      origin: origin,
      destination: destination,
      travelMode: 'DRIVING',
      avoidTolls: true
    }, function(response, status) {
      if (status === 'OK') {
        display.setDirections(response);
      } else {
        alert('Could not display directions due to: ' + status);
      }
    });
  }

  function computeTotalDistance(result) {
    var total = 0;
    var myroute = result.routes[0];
    for (var i = 0; i < myroute.legs.length; i++) {
      total += myroute.legs[i].distance.value;
    }
    total = total / 1000;
    document.getElementById('total').innerHTML = total + ' km';
  }
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAclc0sDq9Nkrb-NcAqCjwQLQuXvnT5EjE&callback=initMap">
  </script>
@endpush
