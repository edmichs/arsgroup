<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 20/07/2019
 * Time: 14:39
 */

namespace App\Http\Repositories;


use App\Models\Produits;
use Illuminate\Http\Request;

class ProduitRepository
{
    public static function getAll()
    {
        return Produits::orderBy('id','desc')->get();
    }

    public static function store(Request $request)
    {
        return Produits::create($request->all());
    }

    public static function getByCategorie($categorie_id)
    {
        return Produits::whereCategorieId($categorie_id)->get();
    }
}