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
=======
    public function store(CompanyCreateRequest $request)
    {
      $request->all();
      echo 'test';
>>>>>>> create RequestForm validation, update form style when error occure and create function to load marker on map after error on form
    }

    public function show()
    {
      return view('home');
    }

    private function create(){

    }
}
