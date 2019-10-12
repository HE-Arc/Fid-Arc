<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
=======
>>>>>>> create RequestForm validation, update form style when error occure and create function to load marker on map after error on form

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
<<<<<<< HEAD
      $card_colors_id = DB::table("card_colors")->pluck("id")->toArray();
        return [
            'email' => 'required|email',
            'first_name' => 'required|min:3|max:40|alpha',
            'last_name' => 'required|min:3|max:40|alpha',
            'password' => 'required|confirmed|min:6',
            'company_name' => 'required|min:3|max:40|alpha',
            'company_description' => 'required|min:5|',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'number_fidelity_points' => 'required|integer|between:1,20',
            'card_color' => 'required|in:'.implode($card_colors_id, ','),
            'message_to_user' => 'required|min:3|max:40'
=======
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
>>>>>>> create RequestForm validation, update form style when error occure and create function to load marker on map after error on form
        ];
    }
}
