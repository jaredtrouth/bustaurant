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

}
