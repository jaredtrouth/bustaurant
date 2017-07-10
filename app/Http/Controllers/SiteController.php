<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Carbon\Carbon;

class SiteController extends Controller
{
    function index()
    {
      $nextservice = Service::where('endtime', '>=', Carbon::now())->oldest('endtime')->first();
      $upcomingservices = Service::where('starttime', '>=', Carbon::now())->oldest('starttime')->limit(5)->get();
      return view('index', compact(['nextservice', 'upcomingservices']));
    }

    public function about()
    {
      $nextservice = Service::where('endtime', '>=', Carbon::now())->oldest('endtime')->first();
      return view('about', compact(['nextservice']));
    }
}
