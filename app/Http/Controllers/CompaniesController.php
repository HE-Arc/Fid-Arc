<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function create()
    {
      return view('companies.create');
    }

    public function store()
    {

    }

    public function show()
    {
      return view('home')
    }
}
