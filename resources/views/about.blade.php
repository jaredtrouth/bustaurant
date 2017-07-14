@extends('layouts.main')

@section('title')
  About
@endsection

@section('content')
  <div class="container" style="margin-top: 60px;margin-bottom: 22px;">
    <h1 class="text-center">About The Bustaurant</h1>

    <div class="col-sm-7 col-md-8">
      @include('partials.about')
    </div>

    @include('partials.sidebar')

  </div>
@endsection
