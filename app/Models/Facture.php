<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
        'numero_facture', 'client_id',
    ];


    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class,'client_id');
    }
}
