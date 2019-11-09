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

    if($validator->fails())
    {
      echo 'Error'; // TODO: return HTTP code error
    }else {
      $scannedUserId = $request->scanned_user_id;
      $companyId = auth()->user()->companyAccount()->get()[0]->id;

      $companyUser = CompanyUser::where('user_id', $scannedUserId)->where('company_id', $companyId)->first();//find the relation in the pivot table with the user id and company id

      if(is_null($companyUser))
      {
        CompanyUser::create([
          'user_id' => $idUser,
          'company_id' => $idCompany,
          'number_of_points' => 0,
          'is_subscribed_to_emails' => $isSubscribedToEmails
        ]);
      }
      else
      {
        //add a fidelity point to the user, if the user reaches the maximum number of points, it is reset to 0
        $companyUser->number_of_points = ($companyUser->number_of_points + 1) % ($company->number_fidelity_points+1);
        $companyUser->save();
      }
    }
  }

    public function getFidelityCards($id)
    {
        return CompanyUserResource::collection(CompanyUser::where('user_id', $id)->get());
    }
}
