@extends('layouts.main')

@section('title', 'Bus Fare')

@section('header')
  <div id="jumbotron" class="jumbotron">
    <div class="menu-board">
      <h1 class="text-center"><u>Today's Menu</u></h1>
      @if (!$menuitems->count())
        <div class="alert alert-danger">
          <p>Error retrieving menu items.</p>
        </div>
      @else
        <ul>
          @foreach ($menuitems->where('active', '=', true) as $item)
            <li title="{{ $item->description }}"><a href="{{ url('menu', $item->slug) }}">{{ $item->name }}</a><span class="pull-right">${{ $item->price }}</span></li>
          @endforeach
        </ul>
      @endif
    </div>
  </div>
@endsection

@section('content')
  <div class="container">
    <h1 class="text-center">Other Fare</h1>
    @if (!$menuitems->count())
      <div class="alert alert-danger">
        <p>Error retrieving menu items.</p>
      </div>
    @else
    <p class="lead">We won't be serving these dishes today, but look for them to make an appearance on George's menu in the future.</p>

    @foreach ($menuitems as $item)
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="panel panel-default menu-item-panel" data-slug="{{ $item->slug }}" title="{{ $item->description }}">
          <div class="panel-heading">
            <span class="pull-right">${{ $item->price }}</span>
            <h4 class="panel-title"><a href="{{url('menu', $item->slug)}}">{{ $item->name }}</a></h4>
          </div>
          <div class="panel-body">
            <div class="row">

              <div class="col-xs-6">
                <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->name }}" class="img-responsive">
              </div>

              <div class="col-xs-6">
                <p><small>{{ $item->description }}</small></p>
              </div>

            </div>

          </div>
        </div>

      </div>
    @endforeach
  @endif
  </div>
@endsection

@push('scripts')
  <script>
  $( ".menu-item-panel" ).click( function(e) {
    window.location.href = '/menu/' + $( this ).attr('data-slug');
  })
  </script>
@endpush
