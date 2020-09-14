<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JSController extends Controller
{
    public function index()
    {
        return view('javascript.index');
    }

    public function jquery()
    {
        return view('javascript.jquery');
    }
}
