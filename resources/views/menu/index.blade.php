@extends('layouts.main')

@section('content')
  <div class="container" style="margin-top: 60px;">
    @foreach ($menuitems as $item)
      <div class="col-sm-4 col-md-3">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a href="{{url('/menu/'.$item->slug.'/edit')}}">{{ $item->name }}</a></h4>
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
