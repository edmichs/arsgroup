<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ArticleRepository;
use App\Http\Repositories\FactureRepository;
use App\Http\Repositories\FournisseurRepository;
use App\Http\Repositories\MouvementRepository;
use App\Http\Repositories\StockRepository;
use App\Models\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('welcome');
    }
}
