<div class="row">

  <div class="col-md-6">
    <address>
      <h4><i class="glyphicon glyphicon-map-marker"></i> <strong>{{ $nextservice->loc_name }}</strong></h4>
      {{ $nextservice->loc_address }}
    </address>
  </div>
  <div class="col-md-6">
    <h5><i class="glyphicon glyphicon-calendar"></i> {{ $nextservice->starttime->format('l, F jS, Y') }}</h5>
    <h5><i class="glyphicon glyphicon-time"></i> {{ $nextservice->starttime->format('g:i A')}} - {{ $nextservice->endtime->format('g:i A')}}</h5>
  </div>
</div>

<div class="row">

  <div id="map" class="img-responsive"></div>

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

</div>

@push('scripts')
  <script>
      function initMap() {
        var location = { lat: {{ $nextservice->loc_lat }}, lng: {{ $nextservice->loc_long }} };
        var name = "{!! $nextservice->loc_name !!}";
        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);

        var map = new google.maps.Map(document.getElementById('map'), {
          center: location,
          zoom: 15
        });

        var marker = new google.maps.Marker({
          position: location,
          map: map,
          title: name
        });

        marker.addListener('click', function() {
          infowindow.open(map, marker);
          infowindowContent.style.display = 'block';
        });

      }
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAclc0sDq9Nkrb-NcAqCjwQLQuXvnT5EjE&callback=initMap">
  </script>
@endpush
