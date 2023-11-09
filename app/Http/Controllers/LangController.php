<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    
    public function change(Request $request, string $locale)
    {

        if (! in_array($locale, ['en', 'es'])) {
            abort(400);
        }
     
        $request->session()->put('lang', $locale);
    
        return redirect()->back();

    }

}
