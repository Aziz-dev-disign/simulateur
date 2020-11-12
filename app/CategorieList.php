<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieList extends Model
{
    protected $fillable = ['nom'];

    public function list()
    {
        return $this->hasMany(ListDocuments::class);
    }
}
