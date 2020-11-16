<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simulateur extends Model
{
    
    protected $fillable = ['id','type_id','nom','slug','montantMin','montantMax','taux','dureeMin','dureeMax','image','description'];

    public function typeSimulation()
    {
        return $this->belongsTo(TypeSimulation::class, 'type_id','id');
    }
}
