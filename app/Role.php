<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = [
        'role', 'description',
    ];

//    public function users()
//    {
//        return $this->belongsToMany(User::class);
//    }
}
