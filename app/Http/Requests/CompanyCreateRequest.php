<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
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
      $card_colors_id = DB::table("card_colors")->pluck("id")->toArray();
        return [
            'email' => 'required|email|unique:users',
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
        ];
    }
}
