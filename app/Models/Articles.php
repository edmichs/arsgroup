<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'nom',
        'designation',
        'prix_achat',
        'quantite_initial',
        'fournisseur_id',
        'caracteristiques',
        'produit_id',
        'made_in'
    ];

    public function produits()
    {
        return $this->belongsTo(\App\Models\Produits::class,'produit_id');
    }
    public function fournisseurs()
    {
        return $this->belongsTo(\App\Models\Fournisseur::class,'fournisseur_id');
    }

    public function article_client()
    {
        return $this->hasMany(\App\Models\ArticleClients::class,'article_id');
    }
    public function mouvement()
    {
        return $this->hasMany(\App\Models\Mouvement::class,'article_id');
    }
}
