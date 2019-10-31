<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ArticleRepository;
use App\Models\ArticleClients;
use App\Models\Articles;
use App\Models\Bon_commande;
use App\Models\Facture;
use App\Models\Client;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;
use App\Http\Repositories\StockRepository;

use DB;

class BonCommandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $array = Array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bon_commandes = Bon_commande::whereStatut(0)->get();
        return view('Pages.Bons.all',compact('bon_commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $n = count(Bon_commande::all()) + 1;
        $numerobon = "BC".$n.mt_rand(0,9999);
        $articles = ArticleRepository::getAll();
        return view('Pages.Bons.add-edit',compact('articles','numerobon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            if($request->has('validate')){

                    ArticleClients::create([
                        'article_id' => $request->input('article_id'),
                        'prix_vente_unitaire' => $request->input('prix_vente_unitaire'),
                        'quantite' => $request->input('quantite'),
                        'numero_bon_commande' => $request->input('numero_bon_commande')
                    ]);
               
               $article_clients = ArticleClients::whereNumeroBonCommande($request->input('numero_bon_commande'))->get();
                return $this->loadTableArticle($article_clients);
            }
        }
        
        DB::beginTransaction();
        
            try{
                $clientele = Client::whereReference($request->input('reference'))->first();
                if(!$clientele){
                    $clientele = Client::create([
                        'nom'=>$request->input('nom'),
                        'reference'=>$request->input('reference'),
                        'telephone'=>$request->input('tel'),
                    ]);
                }
                Bon_commande::create([
                   'numero' =>  $request->input('numero_bon_commande'),
                   'client_id' => $clientele->id,
                   'statut' => 0,
        
                ]);
                DB::commit();

                return redirect(route('bon_commande_path'));

            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->with(['message' => "error d'enregistrement"])->withInput();
            }
    }

    function loadTableArticle($articles){
        $valeur= '<table id="example1" class="table table-bordered table-striped dataTable">
                                        <thead>
                                        <tr>
                                            <!--th>N?</th-->
                                            <th>Designation article</th>
                                            <th width="12%">Quantite</th>
                                            <th>Prix Unitaire</th>
                                            <th>Prix Totale</th>
                                            <th></th>

                                        </tr>
                                        </thead>
                                        <tbody>';
            foreach($articles as $article){
            $valeur.='<tr>
                <td>' .$article->article_id. '</td>
                <td>' .$article->quantite . '</td>
                <td>' .$article->prix_vente_unitaire. '</td>
                <td>' .$article->prix_vente_unitaire * $article->quantite. '</td>';
            $valeur.='<td><a data-toggle="modal"
                                            data-id='.$article->id.'
                                            id="deleteButton"
                                            class="deleteButton"
                                            data-target="#deleteModal"> <i onclick="supprimer('.$article->id.')" class="btn btn-danger fa fa-trash-o"></i></a></td>
              </tr>';

            }
        return $valeur;



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  string  $title
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $bon_commande =   Bon_commande::find($id);
       return view("Pages.Bons.show", compact('bon_commande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        DB::beginTransaction();
        try{
            $bon_commande = Bon_commande::find($id);
        $bon_commande->update([
            'statut' => 1,
        ]);
        $n = count(Facture::all()) + 1;
        $facture = Facture::create([
            "numero_facture" => "FACT".$n.mt_rand(0,9999),
            'client_id' => $bon_commande->client_id,
        ]);
        $article_clients = ArticleClients::whereNumeroBonCommande($bon_commande->numero)->get();
        foreach($article_clients as $article_client){
            $article_client->update([
                'numero_facture' => $facture->numero_facture
            ]);
            
        }
        StockRepository::destockage($article_clients);
        DB::commit();
        return redirect(route('facture_path'));

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with(['message' => 'Erreur lors de l\'enregistrement'])->withInput();
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bon_commande = Bon_commande::find($id)->update([
            'statut' => 2
        ]);
        if ($bon_commande) {
            return redirect()->back()->with(['message' => "Bon de commande annulée avec success"]);
        }
        return redirect()->back()->with(['error' => "Echec d'annulation"]);

    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            if($request->has('supprimer')){
                $article_client = ArticleClients::find($request->input('suppr'));
                $commande = $article_client->numero_bon_commande;
                $article_client->delete();
               $article_clients = ArticleClients::whereNumeroBonCommande($commande)->get();

                return $this->loadTableArticle($article_clients);
            }
        }
    }

    public function print($id)
    {
        $bon_commande = Bon_commande::find($id);
        return view('Pages.Bons.print',compact("bon_commande"));
    }
}
