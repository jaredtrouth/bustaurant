<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\MenuItem;

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
    return view('admin.index', compact(['services', 'menuitems']));
  }
}
