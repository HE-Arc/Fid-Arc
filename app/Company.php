<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\CompanyUser;

class Company extends Model
{
    public function userAccount()
    {
      return $this->hasOne("App\User");
    }

    public function subscribedUser()
    {
      return $this->belongsToMany("App\User")->using('App\CompanyUser')->withPivot('number_of_points');
    }

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
