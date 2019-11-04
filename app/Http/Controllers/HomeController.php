<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      if(Auth::check())
      {
        $user = Auth::user();
        if($user->hasRole('client'))
        {
          //redirect to the user profile
          //return redirect('/user/' + $user->id);
        }
        else
        {
          return redirect('/companies/' . $user->id);
        }
      }
      else
      {
        return redirect('/home');
      }

    }
}
