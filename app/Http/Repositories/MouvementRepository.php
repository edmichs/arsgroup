<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 20/07/2019
 * Time: 20:26
 */

namespace App\Http\Repositories;


use App\Models\Mouvement;
use Illuminate\Http\Request;

class MouvementRepository
{
    public static function getAll()
    {
        return Mouvement::orderBy('id','desc')->get();
    }

    public static function store(Request $request)
    {
        return Mouvement::create($request->all());
    }
}