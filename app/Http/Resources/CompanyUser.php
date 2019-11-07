<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Company;
use App\CardColor;


class CompanyUser extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      $company = Company::find($this->company_id);
        return [
          'company_name' => $company->company_name,
          'message_to_user' => $company->message_to_user,
          'total_number_of points' => $company->number_fidelity_points,
          'current_number_of_points' => $this->number_of_points,
          'card_color_id' => CardColor::find($company->card_color_id)->id
      ];
    }
}
