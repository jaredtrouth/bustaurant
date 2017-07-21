@extends('layouts.main')

@section('content')
  <div class="container" style="margin-top: 60px;">

    <div class="col-sm-8">
      <h1 class="text-center">{{ $menuitem->name }}</h1>
      <p>{{ $menuitem->description}}</p>
      <h4>Price: ${{ $menuitem->price }}</h4>
      <img src="{{ Storage::url($menuitem->image_path) }}" alt="{{ $menuitem->name }}" class="img-responsive">
    </div>

    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Next Service</h3>
        </div>
        <div class="panel-body">
          @include('services.partials.next')
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Upcoming Services</h3>
        </div>
        <div class="panel-body">
          @include('services.partials.upcoming')
        </div>
      </div>

    </div>

  </div>
@endsection
