<div class="row">

  <div class="col-md-6">
    <h4>{{ $nextservice->loc_name }}</h4>
  </div>
  <div class="col-md-6">
    <h5>{{ $nextservice->date->format('l, F jS, Y') }}</h5>
    <h5>{{ $nextservice->starttime->format('g:i A')}} - {{ $nextservice->endtime->format('g:i A')}}</h5>
  </div>
</div>

<div class="row">

  <div id="map" class="img-responsive"></div>

</div>

@push('scripts')
  <script>
      function initMap() {
        var location = { lat: {{ $nextservice->loc_lat }}, lng: {{ $nextservice->loc_long }} };
        var name = "{!! $nextservice->loc_name !!}";
        var map = new google.maps.Map(document.getElementById('map'), {
          center: location,
          zoom: 15
        });

        var marker = new google.maps.Marker({
          position: location,
          map: map,
          title: name
        });
      }
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAclc0sDq9Nkrb-NcAqCjwQLQuXvnT5EjE&callback=initMap">
  </script>
@endpush
