<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PokemonType;

class PokemonTypeController extends Controller
{

    public function index()
    {
        $pokemontypes = PokemonType::paginate(30);
        return view('pokemontype.index', compact('pokemontypes'));
    }
}
