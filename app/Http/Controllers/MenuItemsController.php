<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuItem;

class MenuItemsController extends Controller
{
    // Index
    function index() {
      $menuitems = MenuItem::all();
      return view('menu.index', compact('menuitems'));
    }

    //  Show
    function show($slug) {
      $menuitem = MenuItem::where('slug', '=', $slug)->first();
      return view('menu.show', compact('menuitem'));
    }

    // Create
    function create() {
      return view('menu.create');
    }

    // Store
    function store(Request $request) {
      $this->validate($request, [
        'name'        => 'required|string|unique:menuitems,name',
        'image'       => 'image',
        'description' => 'required|string',
        'active'      => ''
      ]);

      $menuitem = new MenuItem;
      $menuitem->name = $request->name;
      $menuitem->slug = str_slug($request->name);
      $menuitem->description = $request->description;
      $menuitem->active = $request->has('active');
      $menuitem->image_path = $request->file('image')->store('public/menuitems');

      $menuitem->save();

      return redirect('/admin');
    }

    // Edit
    function edit($slug) {
      $menuitem = MenuItem::where('slug', '=', $slug)->first();
      return view('menu.edit', compact('menuitem'));
    }

    // Update
    function update(MenuItem $menuitem, Request $request) {
      $this->validate($request, [
        'name'        => 'required|string|unique:menuitems,name,'.$menuitem.',id',
        'image'       => 'image',
        'description' => 'required|string',
        'active'      => 'boolean'
      ]);

      $menuitem->name = $request->name;
      $menuitem->slug = str_slug($request->name);
      $menuitem->description = $request->description;
      $menuitem->active = $request->has('active');
      $menuitem->image_path = $request->file('image')->store('menuitems');

      $menuitem->save();

      return redirect('/admin');
    }

    // Destroy
    function destroy(MenuItem $menuitem) {
      $menuitem->destroy();

      return redirect('/admin');
    }
}
