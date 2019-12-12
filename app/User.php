<?php
namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Passwords\CanResetPassword;

/**
 * User class with useful methods
 */
class User extends Authenticatable
{
    use HasRoles, HasApiTokens, CanResetPassword, Notifiable;

    /**
     * HasOne relationship to the company
     * @return Object relationship to the company
     */
    public function companyAccount()
    {
      return $this->hasOne("App\Company");
    }

    /**
     * BelongsToMany relationship to the company with pivot table
     * @return Object relationship to the company with pivot table
     */
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

    /**
     * Return a string array with role names
     * @return String[] return a string array with role names
     */
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
