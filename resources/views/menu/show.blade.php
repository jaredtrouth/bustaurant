@extends('layouts.main')

@section('content')
  <div class="container">
    <h1>{{ $menuitem->name }}</h1>
    <img src="{{ Storage::url($menuitem->image_path) }}" alt="{{ $menuitem->name }}">
    <p>{{ $menuitem->description}}</p>
  </div>
@endsection
