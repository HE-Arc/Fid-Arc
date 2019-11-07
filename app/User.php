<?php
namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasRoles, HasApiTokens, Notifiable;

    public function companyAccount()
    {
      return $this->hasOne("App\Company");
    }

    public function fidelityCards()
    {
      return $this->belongsToMany("App\Company")->using('App\CompanyUser')->withPivot('number_of_points');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token', 'roles'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'role_names',
        'company_data'
    ];

    public function getRoleNamesAttribute()
    {
        return $this->getRoleNames();
    }

    public function getCompanyDataAttribute()
    {
        if($this->hasRole('company'))
            return true; //TODO
        else
            return false; //TODO
    }
}
