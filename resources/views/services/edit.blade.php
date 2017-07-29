@extends('layouts.main')

@section('title')
  Edit Service - {{ $service->starttime->format('m/d/Y')}} @ {{ $service->loc_name }}
@endsection

@section('content')
  <div class="container">
    <div class="col-md-4">

      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="/services/{{$service->id}}" method="POST" role="form">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" id="loc_lat" name="loc_lat" value="{{ $service->loc_lat }}" />
        <input type="hidden" id="loc_long" name="loc_long" value="{{ $service->loc_long}}" />
        <legend>Edit Meal Service</legend>

        <div class="form-group{{ $errors->has('loc_name') ? ' has-error' : '' }}">
          <label for="loc_name">Location</label>
          <div class="input-group">
            <input type="text" id="loc_name" name="loc_name" class="form-control" value="{{ $service->loc_name }}">
            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
          </div>
        </div>

        <div class="form-group{{ $errors->has('loc_address') ? ' has-error' : '' }}">
          <label for="loc_address">Address</label>
          <input type="text" class="form-control" id="loc_address" name="loc_address" placeholder="123 Main St. Nashville, TN 12345" value="{{ $service->loc_address }}">
        </div>

        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
          <label for="date">Date</label>
          <div class="input-group">
            <input type="text" class="datepicker form-control" id="date" name="date" placeholder="MM/DD/YY"
            value="{{$service->starttime->format('m/d/Y')}}">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
          </div>
        </div>

        <div class="form-group{{ $errors->has('starttime') ? ' has-error' : '' }}">
          <label for="starttime">Start Time</label>
          <div class="input-group">
            <input type="text" id="starttime" name="starttime" class="form-control" placeholder="HH:MM AM/PM"
            value="{{ $service->starttime->format('g:i A') }}">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
          </div>
        </div>

        <div class="form-group{{ $errors->has('endtime') ? ' has-error' : '' }}">
          <label for="endtime">End Time</label>
          <div class="input-group">
            <input type="text" id="endtime" name="endtime" class="form-control" placeholder="HH:MM AM/PM"
            value="{{ $service->endtime->format('g:i A') }}">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
          </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="cancel" class="btn btn-danger">Cancel</button>
        </div>

    </form>
  </div>

  <div class="col-md-8" id="mapContainer">
    <legend>Map</legend>
    <div id="map" class="img-responsive"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">&nbsp;
      <span id="place-name"  class="title text-center"></span>
      <p id="place-address"></p>
    </div>
  </div>
</div>
@endsection

@push('scripts')
  <script type="text/javascript">
  $( function() {
    $( '.datepicker' ).datepicker({
      minDate: 0,
      changeMonth: true,
      changeYear: true,
      showOtherMonths: true,
      selectOtherMonths: true,
      showButtonPanel: true
    });
  } );

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

    var bounds = new google.maps.Circle({ // Weights the search area to results within the circle
      center: new google.maps.LatLng(36.158598, -86.775676), // Nashville
      radius: 40000 // ~25 miles
    });
    var autocomplete = new google.maps.places.Autocomplete(document.getElementById('loc_name'), bounds);
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

      // Set value of hidden latitude and longitude inputs
      console.log(place.geometry.location.lat());
      $( 'input#loc_lat').val(place.geometry.location.lat());
      $( 'input#loc_long').val(place.geometry.location.lng());

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);  // Why 17? Because it looks good.
      }
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);


      var address = {};
      if (place.address_components) {
        var components = place.address_components;
        for (var i = 0, component; component = components[i]; i++) {
          address[component.types[0]] = component.short_name;
        }
      }

      $( '#loc_address' ).val( [address.street_number, address.route, address.locality, address.administrative_area_level_1, address.postal_code].join(' '));
      $( '#loc_name' ).val(place.name);

      infowindowContent.children['place-icon'].src = place.icon;
      infowindowContent.children['place-name'].innerHTML = place.name;
      infowindowContent.children['place-address'].innerHTML =
      address.street_number + " " + address.route + '<br>' + address.locality +
      ", " + address.administrative_area_level_1 + " " + address.postal_code;
      infowindow.open(map, marker);
      infowindowContent.style.display = 'block';
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
@endpush
