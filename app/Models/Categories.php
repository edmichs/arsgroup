<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'code',
        'libelle'
    ];

    public function produit()
    {
        return $this->hasMany(\App\Models\Produits::class,'categorie_id');
    }
}
