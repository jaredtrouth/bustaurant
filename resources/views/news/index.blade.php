@extends('layouts.main')
<div class="container" style="padding-top: 51px;">
  @foreach ($posts->sortBy('created_at') as $post)
    <h2><a href="{{ url('news', $post->slug) }}">{{ $post->title }}</a></h2>
    <span><em>Posted {{ $post->created_at->format('l, F jS, Y @ g:i A') }}</span></em>
    <p>{{ $post->body }}</p>
  @endforeach
  {{ $posts->links() }}
</div>
