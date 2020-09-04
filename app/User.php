<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Role;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The roles that belong to the user
     */    
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role');
    }

    /**
     *  Checking the role of the authenticated user
     *  @param string $role
     *  @return boolean
     */
    public function hasRole($is_role) {

        $roles = $this->roles;
        foreach ($roles as $role) {
            if($role->name === $is_role){
                return true;
            break;
            }
        }

        return false;
    }

    public function userRole()
    {
            $assign_roles = array();
            $roles = DB::table('roles')->where('name', '!=', 'superuser')->get();
            
            foreach ($roles as $role) {

                if($this->hasRole($role->name) == false){
                    $assign_roles[] = $role;
                }
            }

            return $assign_roles;

    }

    public function profile() {
        return $this->hasOne('App\Profile');
    }
}
