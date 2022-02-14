<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function Indonesia()
    {
        Session()->get('Language');
        Session()->forget('Language');
        Session()->put('Language', 'Indonesia');
        return redirect()->back();
    }

    public function English()
    {
        Session::get('Language');
        Session::forget('Language');
        Session::put('Language', 'English');
        return redirect()->back();
    }
}
