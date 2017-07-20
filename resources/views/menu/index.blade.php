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
    @for ($i=0; $i < $menuitems->count(); $i++)
      @if ($i % 4 === 0)
        <div class="row">
      @endif

      <div class="col-md-3">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a href="{{url('menu', $menuitems[$i]->slug)}}">{{ $menuitems[$i]->name }}</a></h4>
          </div>
          <div class="panel-body">
            <div class="row">

              <div class="col-xs-4">
                <img src="{{ Storage::url($menuitems[$i]->image_path) }}" alt="{{ $menuitems[$i]->name }}" class="img-responsive">
              </div>

              <div class="col-xs-8">
                {{ str_limit($menuitems[$i]->description, 50) }}
              </div>

            </div>

          </div>
        </div>

      </div>
      @if ($i % 4 === 3)
      </div>
      @endif
    @endfor
  </div>
@endsection
