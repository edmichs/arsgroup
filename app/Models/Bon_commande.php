<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bon_commande extends Model
{
    protected $fillable = [
        'numero', 'client_id','statut'
    ];


    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class,'client_id');
    }
}
