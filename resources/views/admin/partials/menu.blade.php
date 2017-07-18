<div role="tabpanel" class="tab-pane fade" id="menu">
  <h2 class="text-center">Menu <a class="btn btn-sm btn-primary" href="{{ url('/menu/create')}}"><i class="glyphicon glyphicon-plus"></i></a></h2>
  @if( !$menuitems->count())
    <span class="text-danger">There are no menu items</span>
  @else
    <table class="table table-hover">
      <thead>
        <th>Item Name</th>
        <th>Image</th>
        <th>Active?</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Edit</th>
        <th>Delete</th>
      </thead>
      <tbody>
        @foreach( $menuitems as $item )
          <tr>
            <td><a href="{{ url('/menu', $item->slug)}}">{{ $item->name }}</a></td>
            <td><button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#imgModal" data-name="{{ $item->name }}" data-src="{{ Storage::url($item->image_path) }}">View</button></td>
            <td><input type="checkbox" data-id="{{ $item->id}}"{{ $item->active ? ' checked' : '' }}></td>
            <td>{{ $item->created_at->diffForHumans() }}</td>
            <td>{{ $item->updated_at->diffForHumans() }}</td>
            <td><a href="{{ url('/menu/'.$item->slug.'/edit') }}"><button class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i></button></a></td>
            <td>
              <form action="{{ url('/menu', $item->slug) }}" method="post">
                {{ csrf_field() }} {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-xs btn-danger record-delete">
                  <i class="glyphicon glyphicon-remove"></i>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
<div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="imgModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <img src="#" alt="" class="img-responsive center-block">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
  <script type="text/javascript">
  $( 'input[type="checkbox"]').change(function() {
    var id = $( this ).attr('data-id');
    $.get( "/menu/" + id + "/toggle-active", function(data) {
      if (data.item.active === true) {
        $( 'input[data-id=' + data.item.id + ']' ).parent().parent().addClass('success');
        setTimeout(function () {
          $( 'input[data-id=' + data.item.id + ']' ).parent().parent().removeClass('success');
        }, 1000);
      } else {
        $( 'input[data-id=' + data.item.id + ']' ).parent().parent().addClass('danger');
        setTimeout(function () {
          $( 'input[data-id=' + data.item.id + ']' ).parent().parent().removeClass('danger');
        }, 1000);
      }
    })
  });

  $( '#imgModal' ).on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var src = button.data('src');
    var name = button.data('name');
    $( this ).find('.modal-title').text(name);
    $( this ).find( 'img' ).attr('src', src);
  });
  </script>
@endpush
