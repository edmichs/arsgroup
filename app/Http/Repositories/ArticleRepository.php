<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 20/07/2019
 * Time: 14:42
 */

namespace App\Http\Repositories;


use App\Models\Articles;
use Illuminate\Http\Request;

class ArticleRepository
{
    public static function getAll()
    {
        return Articles::orderBy('id','desc')->get();
    }

    public static function getByProduits($produit_id)
    {
        return Articles::whereProduitId($produit_id)->get();
    }

    public static function store(Request $request)
    {
        return Articles::create($request->all());
    }
}