<?php
/**
 * Created by PhpStorm.
 * User: EDY TCHOKOUANI
 * Date: 20/07/2019
 * Time: 20:28
 */

namespace App\Http\Repositories;


use App\Models\Stock;
use App\Models\Mouvement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StockRepository
{
    public static function getAll()
    {
        return Stock::orderBy('id','desc')->get();
    }

    public static function store(Request $request)
    {
        return Stock::create($request->all());
    }
    public static function destockage($articles)
    {
        foreach($articles as $article){

            $stock_existant = Stock::whereProduitsId($article->article->produit_id)->first();
            $stock_existant->update([
                'stock_encours' => $stock_existant->stock_encours -= $article->quantite
            ]);
            Mouvement::create([
                'article_id'=> $article->article->id,
                'user_id'=> Auth::user()->id,
                'prix'=> $article->prix_vente_unitaire,
                'type'=> 0,
                'quantite'=> $article->quantite,
            ]);
        }
        
    }
    public static function stockage($article)
    {
        $stock_existant = Stock::whereProduitsId($article->produit_id)->first();
                    if($stock_existant){

                        $stock_existant->update([
                            'stock_encours' => $stock_existant->stock_encours += $article->quantite_initial
                        ]);

                    }else{
                        Stock::create([
                            'produits_id' => $article->produit_id,
                            'seuil_critique' => 10,
                            'stock_initial' => $request->input('quantite_initial'),
                            'stock_encours' => $request->input('quantite_initial'),
                        ]);

                    }
                    Mouvement::create([
                        'article_id'=> $article->id,
                        'user_id'=> Auth::user()->id,
                        'prix'=> $request->input('prix_achat'),
                        'type'=> 1,
                        'quantite'=> $request->input('quantite_initial'),
                    ]);
    }
}