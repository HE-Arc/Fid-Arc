<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyUser;
use App\Company;
use App\User;

class CompanyUserController extends Controller
{
    public function addFidelityCardPoint($idUser, $idCompany, $isSubscribedToEmails = null)
    {
      $company = Company::findOrFail($idCompany);
      $user = User::findOrFail($idUser);
      if(!CompanyUser::isInsertionLegal($user, $company))
      {
        if(!CompanyUser::where('user_id', $idUser)->where('company_id', $idCompany)->exists())
        {
          echo 'ok';
        }
      }
      /*
      CompanyUser::isInsertionLegal($user, $idCompany, $isSubscribedToEmails)
      {
        CompanyUser::create([
          'user_id' => $idUser,
          'company_id' => $idCompany,
          'number_of_points' =>
        ])
      }

      /*$this->user_id = $idUser;
      $this->company_id = $idCompany;
      $this->number_of_points = ($this->number_of_points + 1) % $company->number_fidelity_points;
      if(!is_null($this->isSubscribedToEmails))
      {
        $this->isSubscribedToEmails = $isSubscribedToEmails;
      }
      $this->save();*/
    }
}
