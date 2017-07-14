<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\MenuItem;
use Carbon\Carbon;

class SiteController extends Controller
{
  // https://www.thebustaurant.com
  public function index()
  {
    $nextservice = Service::where('endtime', '>=', Carbon::now())->oldest('endtime')->first();
    $upcomingservices = Service::where('starttime', '>=', Carbon::now())->oldest('starttime')->limit(5)->get();
    return view('index', compact(['nextservice', 'upcomingservices']));
  }

  // https://www.thebustaurant.com/about
  public function about()
  {
    $nextservice = Service::where('endtime', '>=', Carbon::now())->oldest('endtime')->first();
    $upcomingservices = Service::where('starttime', '>=', Carbon::now())->oldest('starttime')->limit(5)->get();
    return view('about', compact(['nextservice', 'upcomingservices']));
  }

  public function catering()
  {
    $menu = MenuItem::all();
    return view('catering', compact(['menu']));
  }
}
