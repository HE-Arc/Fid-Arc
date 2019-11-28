<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Response;

class CompanyUser extends Pivot
{
  private static function isRelationExsist($id_user, $id_company)
  {
    $companyUser = CompanyUser::where('user_id', $id_user)->where('company_id', $id_company)->first();//find the relation in the pivot table with the user id and company id
    if(is_null($companyUser))
    {
      return false;
    }
    else
    {
      return $companyUser;
    }
  }

  private function addPoint($max_number_of_points, $message)
  {
    $http_response = array();
    if($this->number_of_points == $max_number_of_points)
    {
      $this->number_of_points = 1;
      array_push($http_response, $message, 202);
    }
    else
    {
      $this->number_of_points +=1;
      array_push($http_response, 'Number of point is inc', 202);
    }
    $this->save();
    return $http_response;
  }

  public static function addPointOrCreateRelation($user_id, $company)
  {
    $http_response = array();
    $company_id = $company['id'];

    $cu = CompanyUser::isRelationExsist($user_id, $company_id);
    if(!$cu)
    {
      CompanyUser::create([
          'user_id' => $user_id,
          'company_id' => $company_id,
          'number_of_points' => 1,
          'is_subscribed_to_emails' => 0
        ]);
      array_push($http_response, 'Create relation between user and company', 201);
      return $http_response;
    }
    else
    {
      return $cu->addPoint($company['number_fidelity_points'], $company['message_to_user']);
    }
  }
}
