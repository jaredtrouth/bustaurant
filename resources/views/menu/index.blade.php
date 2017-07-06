@extends('layouts.main')

@section('content')
  <div class="container">
    @foreach ($menuitems as $item)
      <div class="col-sm-6 col-md-4">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a href="{{url('/menu/'.$item->slug.'/edit')}}">{{ $item->name }}</a></h4>
          </div>
          <div class="panel-body">
            <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->name }}" class="thumbnail">
            {{ str_limit($item->description, 50) }}
          </div>
        </div>

      </div>
    @endforeach
  </div>
@endsection
