@extends('layouts.main')

@section('content')
  <div class="container" style="padding-top: 60px;">

    <div class="col-sm-8">
      <h2 class="text-center">{{ $post->title }}</h2>
      <em>Posted {{ $post->created_at->format('l, F jS, Y @ g:i A') }}</em>
      <br>
      {!! $post->body !!}
    </div>

    <div class="col-sm-4">
      @include('news.partials.sidebar')
    </div>

  </div>
@endsection
