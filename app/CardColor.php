<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Card Color model 
 */
class CardColor extends Model
{
    /**
     * Hasmany relationship to company
     * @return Object relation to the company
     */
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
