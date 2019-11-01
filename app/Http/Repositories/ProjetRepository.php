<?php


namespace App\Http\Repositories;


use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetRepository
{
    public static function getAll()
    {
        return Projet::all();
    }

   public static function storeLogo(Request $request)
   {
       if (UploadRepository::storeLogo($request) && UploadRepository::storeWorkBook($request)) {
           return self::store($request);
       }
       return null;
   }

   public static function store(Request $request)
   {
      return Projet::create([
            "logo" => $request->input('logo'),
            "name" => $request->input('name'),
            "contact_name" => $request->input('contact_name'),
            "delai" => $request->input('delai'),
            "start_date" => $request->input('start_date'),
            "email" => $request->input('email'),
            "work_book" => $request->input('work_book'),
            "price" => $request->input('price'),
            "telephone" => $request->input('telephone'),
            "simple_description" => $request->input('simple_description'),
            "state" => 1,
            "user_id" => Auth::user()->id,
            "email" => $request->input('email'),
        ]);
   }
}
