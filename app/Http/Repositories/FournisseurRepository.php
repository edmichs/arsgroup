<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 20/07/2019
 * Time: 10:35
 */

namespace App\Http\Repositories;


use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurRepository
{
    public static function getAll()
    {
        return Fournisseur::whereIsoff(0)->orderBy('id','desc')->get();
    }

    public static function store(Request $request)
    {
        return Fournisseur::create($request->all());
    }
}