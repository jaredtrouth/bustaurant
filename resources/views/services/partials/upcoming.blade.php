<ul style="padding-left: 0;">
  @foreach( $upcomingservices as $service )
    <li class="list-unstyled">
      <a style="color:rgb(99, 107, 111);" href="{{ url('services', $service->id) }}"><i class="glyphicon glyphicon-map-marker"></i> {{ $service->loc_name }}<br />
      <i class="glyphicon glyphicon-calendar"></i> {{ $service->starttime->format('l, F jS, Y')}}<br />
      <i class="glyphicon glyphicon-time"></i> {{ $service->starttime->format('g:i A')}} - {{ $service->endtime->format('g:i A')}}</a>
    </li>
    <hr />
  @endforeach
</ul>
