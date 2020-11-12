<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simulation extends Model
{
    protected $fillable = ['id','montant','duree','taux','mensualite','montantTotal','created_at','updated_at'];

    public function rdvSimulation()
    {
        return $this->hasOne(Rdv::class, Simulation::class);
    }

    
}
