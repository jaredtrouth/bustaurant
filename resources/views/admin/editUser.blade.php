@extends('layouts.main')

@section('title', 'Edit User - ' . $user->name)

@section('content')
  <div class="container" style="margin-top:51px;">
    <ol class="breadcrumb">
      <li><a href="{{ url('admin') }}">Admin</a></li>
      <li class="active">Edit User</li>
    </ol>
    <form class="col-md-offset-3 col-md-6" action="{{ url('admin/user', $user->id) }}" method="post">
      {{ csrf_field() }} {{ method_field('PUT') }}

      <legend>Edit User</legend>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Name</label>
        <input required type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
      </div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">E-Mail Address</label>
        <input required type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
      </div>

      <div class="checkbox">
        <label>
          <input type="checkbox" name="admin"{{ $user->admin ? ' checked' : '' }}>
          Site Administrator - <em>Don't check this unless you know what you're doing!</em>
        </label>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
      </div>

    </form>
  </div>
@endsection
