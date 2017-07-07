<div role="tabpanel" class="tab-pane fade" id="news">
  <h2 class="text-center">News <a class="btn btn-sm btn-primary" href="{{ url('/news/create') }}"><i class="glyphicon glyphicon-plus"></i></a></h2>
  @if( !$posts->count() )
    <span class="text-danger">There are no news posts</span>
  @else
    <table class="table table-hover table-striped">
      <tr>
        <thead>
          <th>ID</th>
          <th>Title</th>
          <th>Created</th>
          <th>Last Modified</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
      </tr>
      <tbody>
      @foreach( $posts as $post )
        <tr>
          <td>{{ $post->id}}</td>
          <td><a href="{{ url('/news', $post->slug) }}">{{ $post->title }}</a></td>
          <td>{{ $post->created_at->diffForHumans() }}</td>
          <td>{{ $post->updated_at->diffForHumans() }}</td>
          <td><a class="btn btn-xs btn-default" href="{{ url('/news/'.$post->slug.'/edit')}}"><i class="glyphicon glyphicon-pencil"></i></a></td>
          <td><form action="{{ url('/news', $post->slug)}}" method="post">
            {{ csrf_field() }} {{ method_field('DELETE') }}
            <button class="btn btn-xs btn-danger record-delete" type="submit" name="Delete"><i class="glyphicon glyphicon-remove"></i></button>
          </form></td>
        </tr>
      @endforeach
      </tbody>
    </table>
    {{ $posts->links() }}
  @endif
</div>
