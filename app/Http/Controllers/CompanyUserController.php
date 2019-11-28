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

  /**
   * Add a fidelity point to user for the connect company. Validate the POST parameter.
   * If the relation between the user and company is create, add a point, otherwise create the relation and a point
   * @param Request $request Post request
   * @return Object return a http status and a http code
   */
  public function addFidelityPoint(Request $request)
  {
    $validator = Validator::make($request->all(), [
            'scanned_user_id' => 'required|integer',
            'is_subscribed_to_emails' => 'boolean'
        ]);

    $http_response = array();

    if(!$validator->fails()){
      $scanned_user_id = $request->all()['scanned_user_id'];
      $company = auth()->user()->companyAccount()->get()[0];

      $http_response = CompanyUser::addPointOrCreateRelation($scanned_user_id, $company);
    }
    else
    {
      array_push($http_response, "Please send the correct parameter", 401);
    }
    return response($http_response[0], $http_response[1])->header('Content-Type', 'text/plain');
  }

  /**
   * Get all fidelity card for connect user
   * @return Object fidelity cards for a user
   */
  public function getFidelityCards()
  {
      return CompanyUserResource::collection(CompanyUser::where('user_id', auth()->user()->id)->get());
  }
}
