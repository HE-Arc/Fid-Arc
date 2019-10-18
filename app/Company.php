<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function userAccount()
    {
      //return $this->belongsTo("App\User");
      return $this->hasOne("App\User");
    }

    public function suscribedUser()
    {
      return $this->hasMany("App\User");
    }

<<<<<<< HEAD

=======
>>>>>>> update card colors select list
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'company_description', 'latitude', 'longitude', 'number_fidelity_points', 'message_to_user', 'card_color_id', 'user_id'
    ];

}
