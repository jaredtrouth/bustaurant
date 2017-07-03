@extends('layouts.main')

@section('title', 'Services');

@section('content')
  <div class="container">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Location Name</th>
          <th>Location Address</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($services as $service)
          <tr>
            <td><a href="{{ url('/services/'.$service->id.'/edit') }}">{{ $service->id }}</a></td>
            <td>{{ $service->starttime }}</td>
            <td>{{ $service->endtime }}</td>
            <td>{{ $service->loc_name }}</td>
            <td>{{ $service->loc_address }}</td>
          </tr>
        </tbody>
      @endforeach
    </table>
  </div>
@endsection
