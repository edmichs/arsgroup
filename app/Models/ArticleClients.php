<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleClients extends Model
{
    protected $fillable = [
        'article_id',
        'client_id',
        'prix_vente_unitaire',
        'quantite',
        'numero_bon_commande',
        'numero_facture',
    ];

    public function article()
    {
        return $this->belongsTo(\App\Models\Articles::class,'article_id');
    }
}
