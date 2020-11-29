<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    protected $filable = [
                            '_token',
                            'agence_id',
                            'identifiantClient',
                            'montant',
                            'mensualite',
                            'taux',
                            'etatCivil',
                            'nom','prenom',
                            'dateNaissance',
                            'email',
                            'pays',
                            'telephone',
                            'motif',
                            'dateRdv'
                        ];

    public function agence()
    {
        return $this->belongsTo(Agence::class, 'agence_id','id');
    }

    public function simulation()
    {
        return $this->hasOne(Simulation::class, 'simulation_id', 'id');
    }
}
