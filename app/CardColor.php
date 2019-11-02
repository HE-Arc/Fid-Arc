<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardColor extends Model
{
    public function companies()
    {
      return $this->hasMany('App\Company');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
