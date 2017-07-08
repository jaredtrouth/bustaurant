<div role="tabpanel" class="tab-pane" id="users">
  <h2 class="text-center">Users <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#userForm"><i class="glyphicon glyphicon-plus"></i></button></a></h2>

  <table class="table table-hover">
    <thead>
      <th>Name</th>
      <th>Email</th>
      <th>Created</th>
      <th>Modified</th>
      <th>Actions</th>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->name }}</a></td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->created_at->diffForHumans() }}</td>
          <td>{{ $user->updated_at->diffForHumans() }}</td>
          <td>
              <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#userForm">
                Edit
              </button>
              <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#">
                Reset Password
              </button>
              <button type="button" class="btn btn-sm btn-danger">
                Delete
              </button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</div>
