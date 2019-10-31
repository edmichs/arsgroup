<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'stock_initial',
        'seuil_critique',
        'produits_id',
        'stock_encours',

    ];
}
