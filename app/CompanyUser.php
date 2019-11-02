<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyUser extends Pivot
{
  /**
   * Check if add point process is legal.
   * Legal mean : 1. the user and the company are not the same
   *              2. the user who is added points is a customer
   * @param  Object  $user    a user model
   * @param  Object $company a company model
   * @return boolean          true if process is legal, false otherwise
   */
  public static function isAddPointOperationLegal($user, $company)
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

  protected $hidden = ['user_id', 'company_id'];
}
