<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyUser extends Pivot
{
    public function addFidelityCardPoint($idUser, $idCompany, $isSubscribedToEmails)
    {
      /*$error = '';
      $company = Company::findOrFail($idCompany);
      $user = User::findOrFail($user);

      if($idUser != $company->user_id)
      {
        if($user->HasRoles(''))
        {
          $user->fidelityCards()->save($company);

        }
        else
        {
          $error = 'Only user can create card !';
        }

      }
      else
      {
        $error = 'The user and the company are the same !';
      }
    }*/
}
