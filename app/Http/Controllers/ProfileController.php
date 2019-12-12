<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

/**
 * ProfileController
 */
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

    /**
     * Redirect to the user or the company profile
     * @return Object redirect to the good profile
     */
    public function index()
    {
        if(auth()->user()->hasRole('company'))
        {
          return redirect('/companyProfile');
        }
        else
        {
          return redirect('/userProfile');
        }
    }
}
