@extends('layouts.main')

@section('content')
  <div class="container" style="margin-top: 60px;">
    <h1>{{ $menuitem->name }}</h1>
    <img src="{{ Storage::url($menuitem->image_path) }}" alt="{{ $menuitem->name }}">
    <p>{{ $menuitem->description}}</p>
  </div>
@endsection
