<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function hasRole($roles)
//    {
//        foreach ($roles as $role) {
//
//            $user = User::where('type', $role)->where('id', $this->id)->get();
//            if ($user!=null) {
//                return true;
//            }
//        }
//
//        return false;
//    }
//
//    public function roles()
//    {
//        return $this->belongsToMany(Role::class);
//    }

//    public function authorizeRoles($roles)
//    {
//        if (is_array($roles)) {
//            return $this->hasAnyRole($roles) ||
//                abort(401, 'This action is unauthorized.');
//        }
//        return $this->hasRole($roles) ||
//            abort(401, 'This action is unauthorized.');
//    }
//
//    /**
//     * Check multiple roles
//     * @param array $roles
//     * @return bool
//     */
//    public function hasAnyRole($roles)
//    {
//        return null !== $this->roles()->whereIn('name', $roles)->first();
//    }
//
//    /**
//     * Check one role
//     * @param string $role
//     * @return bool
//     */
//    public function hasRole($role)
//    {
//        return null !== $this->roles()->where('name', $role)->first();
//    }
}
