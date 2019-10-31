<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = [
        'nom',
        'raison_social',
        'adresse',
        'email',
        'tel',
        'nom_contact',
        'reg_commerce'
    ];
    public function articles()
    {
        return $this->hasMany(\App\Models\Articles::class,'fournisseur_id');
    }
}
