<ul>
  @foreach( $upcomingservices as $service )
    <li>
      <a href="{{ url('services', $service->id) }}">{{ $service->loc_name }}</a><br />
      {{ $service->starttime->format('l, F jS, Y')}}<br />
      {{ $nextservice->starttime->format('g:i A')}} - {{ $nextservice->endtime->format('g:i A')}}
    </li>
  @endforeach
</ul>
