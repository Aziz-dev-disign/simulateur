<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $fillable = ['id', 'nom', 'email', 'telephone','ville'];
    public function rdvs()
    {
        return $this->hasMany(Rdv::class);
    }
}
