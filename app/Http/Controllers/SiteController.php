<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function Home()
    {
        return view('index');
    }
    public function registration()
    {
        return view('registration');
    }
}
