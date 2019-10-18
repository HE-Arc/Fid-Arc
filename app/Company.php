<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function userAccount()
    {
      return $this->hasOne("App\User");
    }

    public function suscribedUser()
    {
      return $this->hasMany("App\User");
    }
}
