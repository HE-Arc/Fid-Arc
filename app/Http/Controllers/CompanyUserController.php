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

/**
 * CompanyUserController
 */
class CompanyUserController extends Controller
{
  /**
   * Add a fidelity point to user for the connected company. Validate the POST parameter.
   * If the relation between the user and company exist, add a point, otherwise create the relation and add a point
   * If the user has reach the maximum of the point, the number of point is set to 0, and the company must notify that is has received his reward
   * Verfiy if the connect user is a company.
   * @param Request $request Post request object
   * @return Object return a http status and a http code
   */
  public function addFidelityPoint(Request $request)
  {
    $validator = Validator::make($request->all(), ['scanned_user_id' => 'required|integer']);

    $http_response = array();

    if(!$validator->fails())
    {
      $scanned_user_id = $request->all()['scanned_user_id'];

      //verify if the user is a company
      if(auth()->user()->hasRole('company'))
      {
        $company = auth()->user()->company()->get()[0];

        $http_response = CompanyUser::addPointOrCreateRelation($scanned_user_id, $company);
      }
      else
      {
        array_push($http_response, ["status" => "The user must to be a company.", "number_of_points" => -1], 401);
      }
    }
    else
    {
      array_push($http_response, ["status" => "Please send the correct parameter.", "number_of_points" => -1], 401);
    }
    return response($http_response[0], $http_response[1])->header('Content-Type', 'text/plain');
  }

  /**
   * Get the number of fidelity point between the user and the company.
   * @param  Integer $scanned_user_id user id
   * @return Object return json of number_of_points, return -1 if the relation doesn't exist
   */
  public function getCardPoints($scanned_user_id)
  {
    $company_id = auth()->user()->company()->get()[0]['id'];
    $cu = CompanyUser::isRelationExsist($scanned_user_id, $company_id);
    $number_of_points = -1;

    if($cu)
    {
      $number_of_points = $cu->number_of_points;
    }
    return json_encode(['number_of_points' => $number_of_points]);
  }

  /**
   * Set the field has_reward to 0 in database for a company and a user realtion.
   * Verify if the POST params is correct and if a user is a company
   * @param Request $request Post request object
   * @return Object return a http status and a http code
   */
  public function userGotHisReward(Request $request)
  {
      $validator = Validator::make($request->all(), ['scanned_user_id' => 'required|integer']);
      $http_response = array();
      if(!$validator->fails())
      {
        $scanned_user_id = $request->all()['scanned_user_id'];

        //verify if the user is a company
        if(auth()->user()->hasRole('company'))
        {
          $company = auth()->user()->company()->get()[0];
          $cu = CompanyUser::isRelationExsist($scanned_user_id, $company->id);

          //verifify if the realtion exist
          if(!$cu)
          {
            array_push($http_response, ["status" => "the relation between the user and the company doesn't exist."], 401);
          }
          else
          {
            $cu->has_reward = 0;
            $cu->save();
            array_push($http_response, ["status" => "User got his reward"], 202);
          }
        }
        else
        {
          array_push($http_response, ["status" => "The user must to be a company."], 401);
        }
      }
      else
      {
        array_push($http_response, ["status" => "Please send the correct parameter."], 401);
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
