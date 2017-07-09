<ul>
  @foreach( $upcomingservices as $service )
    <li>
      <a href="{{ url('services', $service->id) }}">{{ $service->loc_name }}</a><br />
      {{ $service->starttime->format('l, F jS, Y')}}<br />
      {{ $service->starttime->format('g:i A')}} - {{ $service->endtime->format('g:i A')}}
    </li>
  @endforeach
</ul>
