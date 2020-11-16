<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListDocument extends Model
{
    protected $fillable = ['id','type_id', 'categorie_id', 'nomDoc','created_at','updated_at'];

    public function type()
    {
        return $this->belongsTo(TypeSimulation::class, 'type_id','id');
    }
    public function categorie()
    {
        return $this->belongsTo(CategorieList::class, 'categorie_id','id');
    }
}
