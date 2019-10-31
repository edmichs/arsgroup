<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    protected $fillable = [
        'article_id',
        'user_id',
        'quantite',
        'prix',
        'type'
    ];
    public function article(){
        return $this->belongsTo(\App\Models\Articles::class,'article_id');
    }
    public function user(){
        return $this->belongsTo(\App\User::class,'user_id');
    }
}
