<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Service;
use App\MenuItem;
use App\Message;
use App\Mail\ContactForm;
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

  // https://www.thebustaurant.com/catering
  public function catering()
  {
    $menu = MenuItem::all();
    return view('catering', compact(['menu']));
  }

  // https://www.thebustaurant.com/contact
  public function contactForm()
  {
    return view('contact');
  }

  // POST https://www.thebustaurant.com/contact
  public function contactFormPost(Request $request)
  {
      $this->validate($request, [
        'name'    => 'required|string',
        'email'   => 'required|email',
        'message' => 'required'
      ]);

      $to = 'jared.trouth@gmail.com';

      $message = Message::create($request->except(['_token', '_method']));

      Mail::to($to)->send(new ContactForm($message));

      session()->flash('success', 'Your message has been sent.');
      return redirect('/contact');
  }
}
