<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\MenuItem;
use App\Post;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $services = Service::where('end_datetime', '>=', new \DateTime())->get();
    $menuitems = MenuItem::all();
    $posts = Post::paginate(10);
    return view('admin.index', compact(['services', 'menuitems', 'posts']));
  }
}
