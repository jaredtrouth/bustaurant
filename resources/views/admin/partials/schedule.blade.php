<div role="tabpanel" class="tab-pane fade in active" id="schedule">
  <h2 class="text-center">Schedule <a class="btn btn-sm btn-primary" href="{{ url('/services/create')}}"><span class="glyphicon glyphicon-plus"></span></a></h2>
  @if( !$services->count() )
    <span class="text-danger">There are no future services.</span>
  @else
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Location</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach( $services->sortBy('starttime') as $service )
          <tr>
            <td>{{$service->starttime->format('m-d-Y')}}</td>
            <td>{{$service->starttime->format('h:i A')}}</td>
            <td>{{$service->endtime->format('h:i A')}}</td>
            <td><a href="//maps.google.com/?q={{$service->loc_lat}},{{$service->loc_long}}">{{$service->loc_name}}</a></td>
            <td>
                <a class="btn btn-xs btn-default" href="{{url('/services/'.$service->id.'/edit')}}"><i class="glyphicon glyphicon-pencil"></i></a>
                <form class="pull-right" method="post" action="{{ url('/services', $service->id) }}">
                  <button class="btn btn-xs btn-danger record-delete"><span class="danger glyphicon glyphicon-remove"></span></button>
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
