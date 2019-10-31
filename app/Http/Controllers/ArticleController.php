<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ArticleRepository;
use App\Http\Repositories\CategorieRepository;
use App\Http\Repositories\FournisseurRepository;
use App\Http\Repositories\ProduitRepository;
use App\Models\Articles;
use App\Models\Mouvement;
use App\Models\Produits;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = ArticleRepository::getAll();
        $produits = ProduitRepository::getAll();
        return view('Pages.Produits.all', compact('articles','produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseurs = FournisseurRepository::getAll();
        $produits = ProduitRepository::getAll();
        $categories = CategorieRepository::getAll();
        return view('Pages.Produits.add-edit', compact('produits','categories','fournisseurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       DB::beginTransaction();
            try{
                $article =  Articles::create([
                    'nom' => $request->input('nom'),
                    'caracteristiques' => $request->input('caracteristiques'),
                    'prix_achat' => $request->input('prix_achat'),
                    'quantite_initial' => $request->input('quantite_initial'),
                    'produit_id' => $request->input('produit_id'),
                    'fournisseur_id' => $request->input('fournisseur_id'),
                    'made_in' => $request->input('made_in'),
                ]);
                if($article){
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
                DB::commit();
                return redirect(route('article_path'));

            }catch (\Exception $e){
                DB::RollBack();
               return redirect()->back()->with(['message' => 'Les informations entr&eacute;es ne sont pas correct']);

            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $article = Articles::find($request->input('suppr'))->update([
            'nom' => $request->input('nom'),
            'produit_id' => $request->input('produit_id'),
            'designation' => $request->input('designation'),
            'caracteristiques' => $request->input('caracteristiques'),
            'prix_achat' => $request->input('prix_achat'),
        ]);
        if($article){
            return redirect()->back()->with(['message' => 'sucess']);
        }
        return redirect()->back()->with(['message' => 'error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
