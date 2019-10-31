<?php

namespace App\Http\Controllers;



use App\Http\Repositories\ArticleRepository;
use App\Models\ArticleClients;
use App\Models\Articles;
use App\Models\Client;
use App\Models\Facture;
use App\Http\Repositories\StockRepository;
use DB;


use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factures = Facture::all();
        return view('Pages.Factures.all',compact('factures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $n = count(Facture::all()) + 1;
        $numerofacture = "FACT".$n.mt_rand(0,9999);
        $articles = Articles::all();
        return view('Pages.Factures.add-edit',compact('articles','numerofacture'));

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
                        'numero_facture' => $request->input('numero_facture')
                    ]);
               $article_clients = ArticleClients::whereNumeroFacture($request->input('numero_facture'))->get();
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
           $facture = Facture::create([
               'numero_facture' =>  $request->input('numero_facture'),
               'client_id' => $clientele->id,

            ]);
            $article_clients = ArticleClients::whereNumeroFacture($facture->numero_facture)->get();
            StockRepository::destockage($article_clients);
            DB::commit();
            return redirect()->route('facture_path');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with(['message'=> "Error"])->withInput();
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facture = Facture::find($id);
        return view("Pages.Factures.show",compact("facture"));
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
    public function update(Request $request, $id)
    {
        //
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
    public function print($id)
    {
        $facture = Facture::find($id);
        return view('Pages.Factures.print', compact("facture"));
    }
}
