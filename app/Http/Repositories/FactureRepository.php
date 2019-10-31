<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 31/07/2019
 * Time: 13:38
 */

namespace App\Http\Repositories;


use App\Models\Facture;

class FactureRepository
{
    public static function getAll()
    {
        return Facture::all();
    }
}