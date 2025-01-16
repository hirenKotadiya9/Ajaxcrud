<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class citycontroller extends Controller
{
    public function index()
    {
        $countries = city::all();
        return view('myweb.ajax.country', compact('city'));
    }
}
