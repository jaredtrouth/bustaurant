@extends('layouts.main')

@section('title')
  Edit {{ $post->title }}
@endsection

@section('content')
  <div class="container" style="padding-top: 60px;">

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
      {{ method_field('PATCH') }}
      <legend>Edit News Post</legend>

      <div class="col-sm-6 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title">Title</label>
        <input required type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $post->title }}">
      </div>

      <div class="col-sm-6 form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
        <label for="slug">Slug</label>
        <div class="input-group">
          <input readonly requred tabindex="-1" type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}">
          <span class="input-group-btn"><button type="button" class="btn btn-default" tabindex="-1" onclick="enableSlug()">Edit</button></span>
        </div>
        <p class="help-block">Used in the link to the news post. Updates automatically, but can be customized with the "Edit" button.</p>
      </div>

      <div class="col-sm-12 form-group">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" name="body" rows="8" cols="80">{{ $post->body }}</textarea>
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
@endsection

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

  function enableSlug() {
    $( '#slug' ).removeAttr('readonly');
  }

  $( '#title' ).on("keyup change", function(event) {
    var title = $( this ).val();

    $( '#slug' ).val(slugify(title));
  })
  </script>
@endpush
