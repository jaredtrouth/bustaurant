<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServicesController extends Controller
{

  // Index
  function index() {
    $services = Service::all();
    return view('services.index', compact('services'));
  }

  // Create
  function create() {
    return view('services.create');
  }

  // Store
  function store() {
    $this->validate($request, [
      'date'      => 'required|date',
      'startime'  => 'required|date',
      'endtime'   => 'required|date',
      'loc_name'  => 'required|string'
    ]); 

    Service::create(['date', 'starttime', 'endtime', 'loc_name', 'loc_lat', 'loc_long']);

    return redirect('/admin');

  }

  // Show
  function show(Service $service) {
    return view('services.show', compact('service'));
  }

  // Edit
  function edit(Service $service) {
    return view('services.edit', compact('service'));
  }

  // Update
  function update(Service $service) {
    return view('services.update', compact('service'));
  }

}
