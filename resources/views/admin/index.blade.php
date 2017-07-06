@extends('layouts.main')

@section('title', 'Admin')

@section('content')
  <div class="container">

    <div class="col-md-2 col-sm-3">
      <nav id="admin-sidebar" data-spy="affix" data-offset-top="51" data-offset-bottom="0">
        <ul class="nav nav-pills nav-stacked" role="tablist" id="admin-tabs">
          <li role="presentation" class="active"><a href="#schedule" aria-controls="schedule" role="tab" data-toggle="pill">Schedule</a></li>
          <li role="presentation"><a href="#menu" aria-controls="menu" role="tab" data-toggle="pill">Menu</a></li>
        </ul>
      </nav>
    </div>

    <div class="col-md-10 col-sm-9 tab-content" id="admin-content">
      {{-- Schedule tab pane --}}
      <div role="tabpanel" class="tab-pane fade in active" id="schedule">
        <h2 class="text-center">Schedule <a class="btn btn-primary" href="{{ url('/services/create')}}"><span class="glyphicon glyphicon-plus"></span></a></h2>
        @if( !$services->count() )
          <span class="text-danger">There are no future services.</span>
        @else
          <table class="table table-hover table-condensed table-striped">
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
                    <div class="btn-group" role="group">
                      <a class="btn btn-default" href="{{url('/services/'.$service->id.'/edit')}}"><i class="glyphicon glyphicon-pencil"></i></a>
                      <form class="pull-left" method="post" action="/services/{{$service->id}}">
                        <button class="btn btn-danger"><span class="danger glyphicon glyphicon-remove"></span></button>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>
      {{-- Menu tab pane --}}
      <div role="tabpanel" class="tab-pane fade" id="menu">
        @if( !$menuitems->count())
          <span class="text-danger">There are no menu items</span>
        @else
          @foreach( $menuitems as $item )
            <div class="container col-md-3 col-sm-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <a class="pull-right" href="{{ url('item/'.$item->slug.'/edit') }}">Edit</a>
                  <h3 class="panel-title"><strong><a href="/menu/{{$item->slug}}">{{ $item->name }}</a></strong></h3>
                </div>
                <div class="panel-body">
                  <img src="{{ Storage::url($item->image_path) }}" class="img-thumbnail center-block">
                  <p>{{ str_limit($item->description, 50) }}</p>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>

  </div>
@endsection

@push('scripts')
  <script type="text/javascript">

  </script>
@endpush
