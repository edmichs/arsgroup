<?php

namespace App\Http\Controllers;

use App\Http\Repositories\FournisseurRepository;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
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
        $fournisseurs = FournisseurRepository::getAll();
        return view('Pages.Fournisseur.all', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Fournisseur.add-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(FournisseurRepository::store($request)){
            return redirect(route('fournisseur_path'));
        }
        return redirect()->back()->with(['message' => 'echec d&apos;ajout']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fournisseur = Fournisseur::find($id);
        return view('Pages.Fournisseur.show', compact('fournisseur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseur = Fournisseur::find($id);

        return view('Pages.Fournisseur.add-edit', compact('fournisseur'));
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

      $fournisseur =  Fournisseur::find($request->input('suppr'))->update([
           'nom'=> $request->input('nom'),
           'tel'=> $request->input('tel'),
           'email'=> $request->input('email'),
           'nom_contact'=> $request->input('nom_contact'),
           'raison_social'=> $request->input('raison_social'),
        ]);
        if($fournisseur){
            return redirect()->back()->with(['message' => 'success']);
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

    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            if($request->has('supprimer')){
                if(Fournisseur::find($request->input('suppr'))->delete()){
                    return redirect()->back()->with(['message' => 'success']);
                }
                return redirect()->back()->with(['message' => 'error']);
            }

        }
        $fournisseur = Fournisseur::find($request->input('suppr'));
        $fournisseur->isOff = 1;
        $fournisseur->save();
        if($fournisseur){
            return redirect()->back()->with(['message' => 'success']);
        }
        return redirect()->back()->with(['message' => 'error']);

    }
}
