@extends('layouts.main')

@section('title', 'Admin')

@section('content')
  <div class="container" id="admin">
    @if ($errors->any())
      <div class="col-xs-12 alert alert-danger">
        <ul>
          @foreach ($errors as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

      <nav id="admin-sidebar">
        <ul class="nav nav-tabs" role="tablist" id="admin-tabs">
          <li role="presentation" class="active"><a href="#schedule" aria-controls="schedule" role="tab" data-toggle="tab">Schedule</a></li>
          <li role="presentation"><a href="#menu" aria-controls="menu" role="tab" data-toggle="tab">Menu</a></li>
          <li role="presentation"><a href="#news" aria-controls="news" role="tab" data-toggle="tab">News</a></li>
          <li role="presentation"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Users</a></li>
        </ul>
      </nav>

    <div class="tab-content">
      {{-- Schedule tab pane --}}
      @include('admin.partials.schedule')
      {{-- Menu tab pane --}}
      @include('admin.partials.menu')
      {{-- News tab pane --}}
      @include('admin.partials.news')
      {{-- Users tab pane --}}
      @include('admin.partials.users')
    </div>

  </div>
@endsection

@push('scripts')
  <script src="{{ mix('js/admin.js') }}" charset="utf-8"></script>
@endpush
