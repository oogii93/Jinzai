<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($locale)
    {
        if(in_array($locale, ['en', 'jp'])){
            Session::put('locale', $locale);
        }
        return redirect()->back();
    }
}
