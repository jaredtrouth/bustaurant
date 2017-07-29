<div role="tabpanel" class="tab-pane" id="users">
  <h2 class="text-center">Users <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createUserForm"><i class="glyphicon glyphicon-plus"></i></button></a></h2>

  <table class="table table-hover">
    <thead>
      <th>Name</th>
      <th>Email</th>
      <th>Admin</th>
      <th>Created</th>
      <th>Modified</th>
      @if (Auth::user()->admin)
        <th></th>
        <th></th>
      @endif
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->name }}</a></td>
          <td>{{ $user->email }}</td>
          <td><span class="glyphicon {{$user->admin ? 'glyphicon-check' : 'glyphicon-unchecked'}}"></span></td>
          <td>{{ $user->created_at->diffForHumans() }}</td>
          <td>{{ $user->updated_at->diffForHumans() }}</td>
          @if (Auth::user()->admin)
            <td>
              <a class="btn btn-sm btn-default" href="{{ url('admin/user', $user->id) }}">
                Edit
              </a>
            </td>
            <td>
              <form method="post" action="{{ url('user', $user->id) }}">
                {{ csrf_field() }} {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-sm btn-danger record-delete">
                Delete
              </button>
              </form>
            </td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>

</div>

<div class="modal fade" id="createUserForm" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Add New User</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" role="form" action="{{ url('admin/user') }}" method="post">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="name" class="col-md-4 control-label">User's Name</label>
            <div class="col-md-8">
              <input required type="text" class="form-control" id="name" name="name" placeholder="John Smith" value="{{ old('name') }}">
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
            <div class="col-md-8">
              <input required type="email" class="form-control" id="email" name="email" placeholder="email@example.com" value="{{ old('email') }}">
            </div>
          </div>

          <div class="form-group">
            <label for="Password" class="col-md-4 control-label">Password</label>
            <div class="col-md-8">
              <input required type="password" class="form-control" id="password" name="password">
            </div>
          </div>

          <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
            <div class="col-md-8">
              <input required type="password" class="form-control" id="password-confirm" name="password_confirmation">
            </div>
          </div>

          <div class="checkbox">
            <label for="admin">Admin</label>
            <input type="checkbox" name="admin">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add User</button>
        </div>
      </form>
    </div>
  </div>
</div>
