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
     public function company()
    {
      return $this->hasOne("App\Company");
    }

    /**
     * All the cards belonging to this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
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
        'name', 'lastname', 'email', 'password', 'company'
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
        'company' => 'json'
    ];

    /**
     * Append more information to the request
     *
     * @var array
     */
    protected $appends = [
        'role_names'
    ];

    /**
     * Add company to the JSON representation
     *
     * @var array
     */
    protected $with = [
        'company'
    ];

    /**
     * Return the roles of the current user
     *
     * @return \Illuminate\Support\Collection
     */
    public function getRoleNamesAttribute()
    {
        return $this->getRoleNames();
    }
}
