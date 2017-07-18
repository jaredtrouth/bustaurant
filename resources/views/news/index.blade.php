@extends('layouts.main')

@section('title', 'News')

@section('content')

  <div class="container" style="padding-top: 51px;">
    <h1 class="text-center">News</h1>

    <div class="col-sm-8">
      @foreach ($posts->sortBy('created_at') as $post)
        <div class="panel panel-default">
          <div class="panel-body">
            <h2><a href="{{ url('news', $post->slug) }}">{{ $post->title }}</a></h2>
            <span><em>Posted {{ $post->created_at->format('l, F jS, Y @ g:i A') }}</em> by <em>{{ $post->user->name }}</em></span>
            <p>{!! str_limit($post->body, 500, '...<br /><a href="'.url('news', $post->slug).'">Read More</a>') !!}</p>
          </div>

        </div>

      @endforeach
      {{ $posts->links() }}
    </div>

    <div class="col-sm-4">
      @include('news.partials.sidebar')
    </div>
  </div>

@endsection
