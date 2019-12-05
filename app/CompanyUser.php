<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Response;

class CompanyUser extends Pivot
{
    /**
     * Return the relation between the user and the company if it exist, otherwise return false
     * @param Integer $id_user scanned user id
     * @param Integer $id_company logged company id
     * @return Object             return the relation CompanyUser if it exist, otherwise return false
     */
    public static function isRelationExsist($id_user, $id_company)
    {
        $companyUser = CompanyUser::where('user_id', $id_user)->where('company_id', $id_company)->first();//find the relation in the pivot table with the user id and company id
        if (is_null($companyUser)) {
            return false;
        } else {
            return $companyUser;
        }
    }

    /**
     * Add a point to a user for a company.
     * If the maximum point is reach, put the message for the user in the http_response status, and set the current point to 0
     * @param Integer $max_number_of_points maximum number of point define by the company
     * @return Array array that contain the status and the code of the http response
     */
    private function addPoint($max_number_of_points)
    {
        $http_response = array();
        if ($this->number_of_points == $max_number_of_points - 1) {
            $this->number_of_points = 0;
            array_push($http_response, 'Number of point is set to 0', 202);
        } else {
            $this->number_of_points += 1;
            array_push($http_response, 'Number of point is inc', 202);
        }
        $this->save();
        return $http_response;
    }

    /**
     * Add a point to the user or create the relation
     * @param Integer $user_id user id
     * @param Object $company company model
     * @return Array array that contain the status and the code of the http response
     */
    public static function addPointOrCreateRelation($user_id, $company)
    {
        $http_response = array();
        $company_id = $company['id'];

        $cu = CompanyUser::isRelationExsist($user_id, $company_id);
        if (!$cu) {
            CompanyUser::create([
                'user_id' => $user_id,
                'company_id' => $company_id,
                'number_of_points' => 1,
                'is_subscribed_to_emails' => 0
            ]);
            array_push($http_response, 'Create relation between user and company', 201);
            return $http_response;
        } else {
            return $cu->addPoint($company['number_fidelity_points'], $company['message_to_user']);
        }
    }

    /**
     * Set the keys for a save update query.
     * This is a fix for tables with composite keys
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            //Put appropriate values for your keys here:
            ->where('user_id', '=', $this->user_id)
            ->where('company_id', '=', $this->company_id);

        return $query;
    }
}
