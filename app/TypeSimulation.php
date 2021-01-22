<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeSimulation extends Model
{
    protected $fillable = ['id','nom','created_at','updated_at'];

    public function documents()
    {
        return $this->hasMany(ListDocument::class, 'id');
    }

    public function simulateur()
    {
        return $this->hasMany(Simulateur::class);
    }
}
