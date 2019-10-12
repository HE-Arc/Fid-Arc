<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use Illuminate\Http\Request;
use App\User;
use App\Company;

class CompaniesController extends Controller
{
    public function create()
    {
      return view('companies.create');
    }

    public function store(CompanyCreateRequest $request)
    {
      $request->all();
    }

    public function show()
    {
      return view('home');
    }

    private function create(){

    }
}
