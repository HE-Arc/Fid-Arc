<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
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

    public function index()
    {
      if(Auth::user()->hasRole('company'))
      {
        return redirect('/companyProfile');
      }
      else
      {
        return redirect('/userProfile');
      }
    }
}
