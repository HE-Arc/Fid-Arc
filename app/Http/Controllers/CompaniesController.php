<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Company;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    public function create()
    {
      $card_colors = DB::table('card_colors')->get();
      return view('companies.create', ['card_colors' => $card_colors]);
    }

    public function store(CompanyCreateRequest $request)
    {
      $arrayResult = $request->all();
      $user = User::create([
          'name' => $arrayResult['first_name'],
          'email' => $arrayResult['email'],
          'password' => Hash::make($arrayResult['password']),
      ]);

      $company = Company::create([
        'company_name' => $arrayResult['company_name'],
        'company_description' => $arrayResult['company_description'],
        'latitude' => $arrayResult['latitude'],
        'longitude' => $arrayResult['longitude'],
        'number_fidelity_points' => $arrayResult['number_fidelity_points'],
        'message_to_user' => $arrayResult['message_to_user'],
        'card_color_id' => $arrayResult['card_color'],
        'user_id' => $user->id
      ]);
      return redirect('/home');
    }

    public function show()
    {
      return view('home');
    }

}