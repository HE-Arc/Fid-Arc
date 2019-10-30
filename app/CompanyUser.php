<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyUser extends Pivot
{
    public static function isInsertionLegal($user, $company)
    {
      $isError = true;

      if($user->id != $company->user_id)
      {
        if($user->hasRole('client'))
        {
          $isError = false;
        }
      }
      return $isError;
    }
}
