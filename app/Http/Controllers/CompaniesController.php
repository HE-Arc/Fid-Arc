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

<<<<<<< HEAD
    public function store(CompanyCreateRequest $request)
    {
<<<<<<< HEAD
      $request->all();
=======
      echo 'test';
>>>>>>> add company register form with page toggler
=======
    public function store(Request $request)
    {
      var_dump($request->all());
>>>>>>> update js toggle and check function
    }

    public function show()
    {
      return view('home');
    }

    private function create(){

    }
}
