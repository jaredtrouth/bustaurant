<div role="tabpanel" class="tab-pane fade" id="menu" style="padding-top:10px">
  <h2 class="text-center">Menu <a class="btn btn-sm btn-primary" href="{{ url('/menu/create')}}"><i class="glyphicon glyphicon-plus"></i></a></h2>
  @if( !$menuitems->count())
    <span class="text-danger">There are no menu items</span>
  @else
    @foreach( $menuitems as $item )
      <div class="container col-md-3 col-sm-4">
        <div class="panel panel-default menu-item-panel">
          <div class="panel-heading">
            <a class="pull-right" href="{{ url('menu/'.$item->slug.'/edit') }}"><button class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i></button></a>
            <h3 class="panel-title"><strong><a href="/menu/{{$item->slug}}">{{ $item->name }}</a></strong></h3>
          </div>
          <div class="panel-body">
            <img src="{{ Storage::url($item->image_path) }}" class="img-thumbnail center-block">
            <p>{{ str_limit($item->description, 50) }}</p>
          </div>
        </div>
      </div>
    @endforeach
  @endif
</div>
