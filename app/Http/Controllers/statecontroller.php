<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class StateController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('myweb.ajax.state', compact('countries'));

        public function store(Request $request)
{
    $validated = $request->validate([
        'country_id' => 'required|exists:countries,id',
        'state_name' => 'required|string|max:255',
    ]);

    State::create([
        'country_id' => $validated['country_id'],
        'name' => $validated['state_name'],
    ]);

    return redirect()->route('state.index')->with('success', 'Country added successfully!');
}

    }
}

