@extends('layouts.main')

@section('title', 'Bus Fare')

@section('header')
  <div id="jumbotron" class="jumbotron">
    <div class="menu-board">
      <h1 class="text-center"><u>Today's Menu</u></h1>
      <ul>
        @foreach ($menuitems->where('active', '=', true) as $item)
          <li title="{{ $item->description }}"><a href="{{ url('menu', $item->slug) }}">{{ $item->name }}</a><span class="pull-right">${{ $item->price }}</span></li>
        @endforeach
      </ul>
    </div>
  </div>
@endsection

@section('content')
  <div class="container">
    <h1 class="text-center">Other Fare</h1>
    <p class="lead">We won't be serving these dishes today, but look for them to make an appearance on George's menu in the future.</p>
    @foreach ($menuitems as $item)
      <div class="col-sm-4 col-md-3">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a href="{{url('menu', $item->slug)}}">{{ $item->name }}</a></h4>
          </div>
          <div class="panel-body">
            <div class="row">

              <div class="col-xs-4">
                <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->name }}" class="img-responsive">
              </div>

              <div class="col-xs-8">
                {{ str_limit($item->description, 50) }}
              </div>

            </div>

          </div>
        </div>

      </div>
    @endforeach
  </div>
@endsection
