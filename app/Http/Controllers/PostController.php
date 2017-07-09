<?php

namespace App\Http\Controllers;

use App\Post;
use App\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth', ['except' => [
      'index', 'show',
      ]]);
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $posts = Post::paginate(10);
    $upcomingservices = Service::where('starttime', '>=', Carbon::now())->oldest('starttime')->limit(5)->get();
    $nextservice = Service::where('endtime', '>=', Carbon::now())->oldest('endtime')->first();

    return view('news.index', compact(['posts', 'upcomingservices', 'nextservice']));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('news.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validate($request, [
      'title'   => 'string|required',
      'slug'    => 'max:50|alpha_dash|required|unique:posts,slug',
      'body'    => 'string|required',
    ]);

    Post::create($request->except(['_token']));

    return redirect('/admin');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function show($slug)
  {
    $post = Post::where('slug', '=', $slug)->first();
    $upcomingservices = Service::where('starttime', '>=', Carbon::now())->oldest('starttime')->limit(5)->get();
    $nextservice = Service::where('endtime', '>=', Carbon::now())->oldest('endtime')->first();

    return view('news.show', compact(['post', 'upcomingservices', 'nextservice']));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function edit($slug)
  {
    $post = Post::where('slug', '=', $slug)->first();

    return view('news.edit', compact(['post']));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $slug)
  {
    $post = Post::where('slug', '=', $slug)->first();

    $post->update($request->except(['_token', '_method']));

    return redirect('/admin');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function destroy(Post $post)
  {
    $post->delete();
  }
}
