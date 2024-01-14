<?php

namespace App\Http\Controllers;

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
