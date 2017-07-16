@extends('layouts.main')

@section('title', 'Contact')

@section('content')
  <div class="container" style="padding-top: 51px;">
    <form action="{{ url('contact') }}" method="post">
      {{ csrf_field() }}
      <legend>Contact Us</legend>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if (session()->has('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="Name">Name</label>
        <input required type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
      </div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">E-Mail Address</label>
        <input required type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
      </div>

      <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
        <label for="message">Message</label>
        <textarea required id="message" name="message" class="form-control" rows="8" cols="80">{{ old('message') }}</textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">
          Submit
        </button>
        <button type="reset" class="btn btn-danger">
          Reset
        </button>
      </div>
    </form>
  </div>
@endsection
