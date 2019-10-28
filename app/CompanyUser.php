<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyUser extends Pivot
{
    public static function addFidelityCardPoint($idUser, $idCompany, $isSubscribedToEmails)
    {
      $error = '';
      $company = Company::findOrFail($idCompany);
      $user = User::findOrFail($idUser);

      if($idUser != $company->user_id)
      {
        if($user->HasRoles('company'))
        {
          $this->user_id = $idUser;

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
      echo $error;
    }

}
