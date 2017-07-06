@extends('layouts.main')

@section('content')
  <div class="container">
    <form class="col-sm-8 col-sm-offset-2" action="{{ url('/menu')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <legend>Create Menu Item</legend>
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="row">
        <div class="col-sm-6 form-group{{$errors->has('name') ? ' has-error' : ''}}">
          <label for="name">Name</label>
          <input required type="text" class="form-control" id="name" name="name" placeholder="Title" value="{{$menuitem->name}}" onchange="updateSlug()">
        </div>

        <div class="col-sm-6 form-group{{$errors->has('image') ? ' has-error' : ''}}">
          <label for="image">Image</label>
          <input type="file" id="image" name="image">
        </div>
      </div>

      <div class="checkbox">
        <label for="active">
          <input type="checkbox" id="active" name="active"{{$menuitem->active ? ' checked' : ''}}> On the menu now?
        </label>
      </div>

      <div class="form-group{{$errors->has('description') ? ' has-error' : ''}}">
        <label for="description">Description</label>
        <textarea required name="description" rows="5" cols="80" placeholder="Enter item description...">{{$menuitem->description}}</textarea>
      </div>

      <div class="form-group">
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        <button class="btn btn-danger" type="reset" name="reset">Reset</button>
      </div>
    </form>
  </div>
@endsection
