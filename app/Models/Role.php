<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'libelle',
        'description',
       
    ];
    public function user()
    {

        return $this->belongsToMany(\App\User::class,'user_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(\App\Model\Permissions::class);
    }
}
