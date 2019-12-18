<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CompanyUser;

/**
 * Company model with useful methods
 */
class Company extends Model
{
    /**
     * HasOne relationship to the user
     * @return Object relationship to the user
     */
    public function userAccount()
    {
        return $this->hasOne("App\User");
    }

    /**
     * BelongsToMany relationship to the user with the pivot table
     * @return Object relationship to the user withn pivot table
     */
    public function subscribedUser()
    {
        return $this->belongsToMany("App\User")->using('App\CompanyUser')->withPivot('number_of_points');
    }

    /**
     * BelongTo relationship to card color
     * @return Object relationship to card color
     */
    public function cardColor()
    {
        return $this->belongsTo('App\CardColor');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'company_description', 'latitude', 'longitude', 'number_fidelity_points', 'message_to_user', 'card_color_id', 'user_id'
    ];
}
