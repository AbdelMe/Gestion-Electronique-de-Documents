<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        if (!array_key_exists($locale, config('app.available_locales'))) {
            $locale = config('app.fallback_locale');
        }
        
        Session::put('locale', $locale);
        return redirect()->back();
    }
}
