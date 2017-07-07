@extends('layouts.main')

@section('title', 'Admin')

@section('content')
  <div class="container">

      <nav id="admin-sidebar" data-spy="affix" data-offset-top="51" data-offset-bottom="0">
        <ul class="nav nav-tabs" role="tablist" id="admin-tabs">
          <li role="presentation" class="active"><a href="#schedule" aria-controls="schedule" role="tab" data-toggle="pill">Schedule</a></li>
          <li role="presentation"><a href="#menu" aria-controls="menu" role="tab" data-toggle="pill">Menu</a></li>
          <li role="presentation"><a href="#news" aria-controls="news" role="tab" data-toggle="pill">News</a></li>
        </ul>
      </nav>

    <div class="tab-content">
      {{-- Schedule tab pane --}}
      @include('admin.partials.schedule')
      {{-- Menu tab pane --}}
      @include('admin.partials.menu')
      {{-- News tab pane --}}
      @include('admin.partials.news')
    </div>

  </div>
@endsection

@push('scripts')
  <script src="{{ mix('js/admin.js') }}" charset="utf-8"></script>
@endpush
