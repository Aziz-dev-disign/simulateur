<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['nom'];

    public function permissionsRole()
    {   
        return $this->belongsToMany(Role::class);
    }
}
