<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Carbon\Carbon;

class ServicesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth', ['except' => [
      'index', 'show',
      ]]);
  }

  // Index
  function index() {
    $services = Service::where('endtime', '>=', Carbon::now())->get();
    return view('services.index', compact('services'));
  }

  // Create
  function create() {
    return view('services.create');
  }

  // Store
  function store(Request $request) {
    $this->validate($request, [
      'date'      => 'required|date_format:m/d/Y',
      'starttime'  => 'required|date_format:g:i A',
      'endtime'   => 'required|date_format:g:i A',
      'loc_name'  => 'required|string',
      'loc_address' => 'required'
    ]);

    $service = new Service;

    $service->starttime = Carbon::createFromFormat("m/d/Y g:i A", "$request->date $request->starttime");
    $service->endtime = Carbon::createFromFormat("m/d/Y g:i A", "$request->date $request->endtime");
    $service->loc_name = $request->loc_name;
    $service->loc_address = $request->loc_address;
    $service->loc_lat = $request->loc_lat;
    $service->loc_long = $request->loc_long;

    $service->save();

    return redirect('/admin');

  }

  // Show
  function show(Service $service) {
    $upcomingservices = Service::where('starttime', '>=', Carbon::now())->oldest('starttime')->limit(5)->get();
    return view('services.show', compact(['service', 'upcomingservices']));
  }

  // Edit
  function edit(Service $service) {
    return view('services.edit', compact('service'));
  }

  // Update
  function update(Request $request, Service $service) {
    $service->starttime = Carbon::createFromFormat("m/d/Y g:i A", "$request->date $request->starttime");
    $service->endtime = Carbon::createFromFormat("m/d/Y g:i A", "$request->date $request->endtime");
    $service->loc_name = $request->loc_name;
    $service->loc_address = $request->loc_address;
    $service->loc_lat = $request->loc_lat;
    $service->loc_long = $request->loc_long;

    $service->save();

    return redirect('/admin');
  }

  // Destroy
  function destroy(Service $service)
  {
    $service->delete();

    return redirect('/admin');
  }
}
