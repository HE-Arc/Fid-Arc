<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'first_name' => 'required|min:5|max:40|alpha',
            'last_name' => 'required|min:5|max:40|alpha',
            'password' => 'required|confirmed|min:6',
            'company_name' => 'required|min:5|max:40|alpha',
            'company_description' => 'required|min:10|',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'number_fidelity_points' => 'required',
            'card_color' => 'required',
            'message_to_user' => 'required|min:5|max:100'
        ];
    }
}
