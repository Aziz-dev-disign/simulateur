<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    public function agence()
    {
        return $this->belongsTo(Agence::class, 'agence_id','id');
    }

    public function simulation()
    {
        return $this->hasOne(Simulation::class, Rdv::class, 'simulation_id', 'id');
    }
}
