<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\CardColor;

class Company extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'company_name' => $this->company_name,
            'company_description' => $this->company_description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }
}
