<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'logo',
        'contact_name',
        'simple_description',
        'work_book',
        'start_date',
        'delai',
        'name',
        'resume',
        'resume_path',
        'state',
        'price',
        'user_id'
    ];
}
