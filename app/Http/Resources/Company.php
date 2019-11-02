<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\CardColor;

class Company extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'company_name' => $this->company_name,
          'company_description' => $this->company_description,
          'latitude' => $this->latitude,
          'longitude' => $this->longitude,
          'number_fidelity_points' => $this->number_fidelity_points,
          'card_color' => CardColor::find($this->card_color_id)
        ];
    }
}
