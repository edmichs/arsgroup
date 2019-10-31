<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nom',
        'reference',
        'telephone',
        'cni',
        'profession',
        'email',
        'produit_id',
        'made_in'
    ];

    public function bon_commande()
    {
        return $this->hasMany(\App\Models\Bon_commande::class,'client_id');
    }

    public function facture()
    {
        return $this->hasMany(\App\Models\Facture::class,'client_id');
    }
}
