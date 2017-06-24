@extends('layouts.main')

@section('title')
Edit Service - {{ $service->start_datetime->format('m/d/Y @ g:i A')}}
@endsection

@section('content')
<div class="container">
  <div class="col-md-4">
    <form action="" method="POST" role="form">
      <legend>Add Meal Service</legend>

      <div class="form-group">
        <label for="locname">Location</label>
        <div class="input-group">
          <input type="text" id="locname" class="form-control" value="{{ $service->loc_name }}">
          <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
          
        </div>
      </div>

      <div class="form-group">
        <label for="date">Date</label>
        <div class="input-group">
          <input type="text" class="form-control" id="date" placeholder="MM/DD/YY"
          value="{{$service->start_datetime->format('m/d/Y')}}">
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
      </div>

      <div class="form-group">
        <label for="starttime">Start Time</label>
        <div class="input-group">
          <input type="text" id="starttime" class="form-control" placeholder="HH:MM AM/PM" 
          value="{{ $service->start_datetime->format('g:i A') }}">
          <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
        </div>
      </div>

      <div class="form-group">
        <label for="endtime">End Time</label>
        <div class="input-group">
          <input type="text" id="endtime" class="form-control" placeholder="HH:MM AM/PM"
          value="{{ $service->end_datetime->format('g:i A') }}">
          <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
        </div>
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="cancel" class="btn btn-danger">Cancel</button>
    </form>
  </div>
  <div class="col-md-8" id="mapContainer">
    <legend>Map</legend>
    <div id="map" class="img-responsive"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">&nbsp;
      <span id="place-name"  class="title"></span>
      <p id="place-address"></p>
      <p id="place-times"></p>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  function initMap() {
    resizeBootstrapMap();

    var location = { lat: {{ $service->loc_lat }}, lng: {{ $service->loc_long }} };
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: location
    });

    var marker = new google.maps.Marker({
      position: location,
      map: map,
    });

    var autocomplete = new google.maps.places.Autocomplete(document.getElementById('locname'));
    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);

    autocomplete.addListener('place_changed', function() {
      infowindow.close();
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        // User entered the name of a Place that was not suggested and
        // pressed the Enter key, or the Place Details request failed.
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker.setVisible(true);
    marker.setPosition(place.geometry.location);

    var address = '';
    if (place.address_components) {
      address = [
      (place.address_components[0] && place.address_components[0].short_name || ''),
      (place.address_components[1] && place.address_components[1].short_name || ''),
      (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindowContent.children['place-icon'].src = place.icon;
    infowindowContent.children['place-name'].textContent = place.name;
    infowindowContent.children['place-address'].textContent = address;
    infowindowContent.children['place-times'].textContent = "{{ $service->start_datetime->format('m/d/Y g:i A')}} - {{ $service->end_datetime->format('g:i A') }}";
    infowindow.open(map, marker);
    });
  }

  function resizeBootstrapMap() {
    var mapParentWidth = $('#mapContainer').width();
    $('#map').width(mapParentWidth);
    $('#map').height(2 * mapParentWidth / 4);
     google.maps.event.trigger($('#map'), 'resize');
  }

  // resize the map whenever the window resizes
  $(window).resize(resizeBootstrapMap);
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAclc0sDq9Nkrb-NcAqCjwQLQuXvnT5EjE&libraries=places&callback=initMap">
</script>
@endsection