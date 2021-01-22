<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simulateur extends Model
{
    
    protected $fillable = ['id','type_id','nom','slug','statut','montantMin','montantMax','taux','dureeMin','dureeMax','image','description'];

    public function typeSimulation()
    {
        return $this->belongsTo(TypeSimulation::class, 'type_id','id');
    }

    public function scopeStatuActif($query)
    {
        return $query->where('statut', 'actif')->get();
    }

    public function scopeStatuInactif($query)
    {
        return $query->where('statut', 'inactif')->orderBy('created_at','DESC')->get();
    }

    public function getStatusOptions(){
        return [
            'actif'   =>'Actif',
            'inactif'  =>'Inactif'
        ];
    }
}
