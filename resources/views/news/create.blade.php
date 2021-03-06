@extends('layouts.main')

<div class="container" style="padding-top: 51px;">

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ url('news') }}" method="post">
    {{ csrf_field() }}
    <legend>Create News Post</legend>

    <div class="col-sm-6 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
      <label for="title">Title</label>
      <input required type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title')}}">
    </div>

    <div class="col-sm-6 form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
      <label for="slug">Slug</label>
      <div class="input-group">
        <input readonly tabindex="-1" type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
        <span class="input-group-btn"><button type="button" class="btn btn-default" tabindex="-1">Edit</button></span>
      </div>
    </div>

    <div class="col-sm-12 form-group">
      <label for="body">Body</label>
      <textarea class="form-control" id="body" name="body" rows="8" cols="80"></textarea>
    </div>

    <div class="col-sm-12 form-group">
      <button type="submit" class="btn btn-primary">
        Create
      </button>
      <button type="reset" class="btn btn-danger">
        Reset
      </button>
    </div>

  </form>
</div>

@push('scripts')
  <script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
  CKEDITOR.replace('body');
  function slugify(text) {
    return text
      .toLowerCase()
      .replace(/ /g, '-')
      .replace(/[^\w-]+/g, '');
  }

  $( '#title' ).change(function(event) {
    var title = $( this ).val();

    $( '#slug' ).val(slugify(title));
  })
  </script>
@endpush
