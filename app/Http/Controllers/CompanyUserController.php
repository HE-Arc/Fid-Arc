<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyUser;
use App\Company;
use App\User;
use App\Http\Resources\CompanyUser as CompanyUserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyUserController extends Controller
{

  public function addFidelityPoint(Request $request)
  {//see this post : https://laravel.com/docs/4.2/eloquent#working-with-pivot-tables
    $validator = Validator::make($request->all(), [
            'scanned_user_id' => 'required|integer',
            'is_subscribed_to_emails' => 'boolean'
        ]);
  }

    public function getFidelityCards()
    {
        return CompanyUserResource::collection(CompanyUser::where('user_id', auth()->user()->id)->get());
    }
}
