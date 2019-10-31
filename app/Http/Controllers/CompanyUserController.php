<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyUser;
use App\Company;
use App\User;

class CompanyUserController extends Controller
{
    /**
     * Add a fidelity point to a user for a company if the user have alredy a fidelity card with this company.
     * Otherwise, create a fidelity card for the user for a company
     * @param Integer  $idUser               id of the user
     * @param Integer  $idCompany            id of the company
     * @param boolean $isSubscribedToEmails true if the user want to be subscribed to email, false otherwise
     */
    public function addFidelityCardPoint($idUser, $idCompany, $isSubscribedToEmails = false)
    {
      $company = Company::findOrFail($idCompany);
      $user = User::findOrFail($idUser);
      if(!CompanyUser::isAddPointOperationLegal($user, $company))
      {
        $companyUser = CompanyUser::where('user_id', $idUser)->where('company_id', $idCompany)->first();//find the relation in the pivot table with the user id and company id

        //if the model doesn't exist create a relation in the pivot table, otherwise increment a fidelity point
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
}
