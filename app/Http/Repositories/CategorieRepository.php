<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 20/07/2019
 * Time: 14:45
 */

namespace App\Http\Repositories;


use App\Models\Categories;
use Illuminate\Http\Request;

class CategorieRepository
{
    public static function getAll()
    {
        return Categories::orderBy('id','desc')->get();
    }

    public static function store(Request $request)
    {
        return Categories::create($request->all());
    }


}