<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function switchLocale($locale)
    {
        session(['locale' => $locale]);

        return redirect()->back();
    }
}
