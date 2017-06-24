@extends('layouts.main')

@section('title', 'Services');

@section('content')
<table class="table table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Start Time</th>
      <th>End Time</th>
      <th>Location Name</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($services as $service)
    <tr>
      <td><a href="{{ url('/services/'.{{ $service->id }}.'/edit') }}">{{ $service->id }}</a></td>
      <td>{{ $service->start_datetime }}</td>
      <td>{{ $service->end_datetime }}</td>
      <td>{{ $service->loc_name }}</td>
    </tr>
  </tbody>
    @endforeach
</table>
@endsection