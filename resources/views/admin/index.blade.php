@extends('layouts.main')

@section('title', 'Admin')

@section('content')
<div class="container">
  <div id="admin-sidebar" class="container col-md-2 col-sm-3" data-spy="affix" data-offset-top="60" data-offset-bottom="200">
    <ul class="nav nav-pills nav-stacked" role="tablist" id="admin-tabs">
      <li role="presentation" class="active"><a href="#schedule" aria-controls="schedule" role="tab" data-toggle="pill">Schedule</a></li>
      <li role="presentation"><a href="#menu" aria-controls="menu" role="tab" data-toggle="pill">Menu</a></li>
    </ul>
  </div>
  <div class="col-md-10 sol-sm-9 tab-content" id="admin-content">
    {{-- Schedule tab pane --}}
    <div role="tabpanel" class="tab-pane fade in active" id="schedule">
      <h2 class="text-center">Schedule</h2>
      @if( !$services->count() )
      <span class="text-danger">There are no future services.</span>
      @else
      <table class="table table-hover table-condensed table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Location</th>
          </tr>
        </thead>
        <tbody>
          @foreach( $services as $service )
          <tr>
            <td><a href="/services/{{ $service->id }}/edit">{{ $service->id }}</a></td>
            <td>{{$service->start_datetime->format('m-d-Y')}}</td>
            <td>{{$service->start_datetime->format('h:i A')}}</td>
            <td>{{$service->end_datetime->format('h:i A')}}</td>
            <td><a href="//maps.google.com/?q={{$service->loc_lat}},{{$service->loc_long}}">{{$service->loc_name}}</a></td>
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
          <h3 class="panel-title"><strong><a href="/menuitems/{{$item->slug}}">{{ $item->name }}</a></strong></h3>
        </div>
        <div class="panel-body">
          <img src="{{ $item->image_path }}" class="img-thumbnail">
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