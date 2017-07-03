<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Carbon\Carbon;

class SiteController extends Controller
{
    function index()
    {
      $nextservice = Service::where('date', '>=', Carbon::now())->orderBy('date')->first();
      return view('index', compact('nextservice'));
    }
}
