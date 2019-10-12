<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function create()
    {
      return view('companies.create');
    }

    public function store(CompanyCreateRequest $request)
    {
      $request->all();
      echo 'test';
    }

    public function show()
    {
      return view('home');
    }
}
