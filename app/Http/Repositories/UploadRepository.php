<?php


namespace App\Http\Repositories;

use Illuminate\Http\Request;

class UploadRepository
{
    public static function storeLogo(Request $request)
    {
        if ($request->file('logo')->isValid()) {
            $request->file('logo')->move(public_path().'/img/logo', $request->file('avatar'));
           return  $request->file('logo')->store('Logo');
        }
        return null;
    }
    public static function storeWorkBook(Request $request)
    {
        if ($request->file('work_book')->isValid()) {
            $request->file('work_book')->move(public_path().'/img/work_book', $request->file('avatar'));
           return  $request->file('work_book')->store('work_book');
        }
        return null;
    }


}
