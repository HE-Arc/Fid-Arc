<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyUser;
use App\Company;
use App\User;
use App\Http\Resources\CompanyUser as CompanyUserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Response;

class CompanyUserController extends Controller
{

  public function addFidelityPoint(Request $request)
  {
    $validator = Validator::make($request->all(), [
            'scanned_user_id' => 'required|integer',
            'is_subscribed_to_emails' => 'boolean'
        ]);

    $http_response = array();

    if(!$validator->fails()){
      $scanned_user_id = $request->all()['scanned_user_id'];
      $company = User::find(4)->companyAccount()->get()[0];

      $http_response = CompanyUser::addPointOrCreateRelation($scanned_user_id, $company);
    }
    else
    {
      array_push($http_response, "Please send the correct parameter", 401);
    }
    return response($http_response[0], $http_response[1])->header('Content-Type', 'text/plain');
  }

    /**
     * G
     * @return [type] [description]
     */
    public function getFidelityCards()
    {
        return CompanyUserResource::collection(CompanyUser::where('user_id', auth()->user()->id)->get());
    }
}
