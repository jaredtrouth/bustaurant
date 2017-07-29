<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\MenuItem;
use App\Post;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $services = Service::where('endtime', '>=', new \DateTime())->get();
        $menuitems = MenuItem::orderBy('active', 'desc')->get();
        $posts = Post::paginate(10);
        $users = User::all();
        return view('admin.index', compact(['services', 'menuitems', 'posts', 'users']));
    }

    public function createUser(Request $request)
    {
        $this->validate($request, [
      'name' => 'required|string',
      'email' => 'required|string|email|unique:users',
      'password' => 'required|string|min:6|confirmed',
      'admin' => ''
    ]);

        User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password)
    ]);

        return redirect('admin');
    }

    public function editUser(User $user)
    {
        return view('admin.editUser', compact(['user']));
    }

    public function updateUser($id, Request $request)
    {
        $user = User::find($id);

        $this->validate($request, [
        'name' => 'required|string',
        'email' => 'required|string|email|unique:users,email,'.$user->id.',id',
        'admin' => ''
      ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->admin = $request->has('admin');

        $user->save();

        return redirect('admin');
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect('admin');
    }
}
