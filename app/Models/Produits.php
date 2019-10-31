<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    protected $fillable = [
        'code',
        'libelle',
        'categorie_id'
    ];

    public function categorie()
    {
        return $this->belongsTo(\App\Models\Categories::class,'categorie_id');
    }

    public function articles()
    {
        return $this->hasMany(\App\Models\Articles::class,'produit_id');
    }
}
