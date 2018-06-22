<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Pokemontype;
use Illuminate\Support\Facades\DB;

class PokemonsController extends Controller
{

    //show all pokemon
    public function index()
    {
        // $pokemons = Pokemon::paginate(20);
        // $pokemons = Pokemon::all();
        // $pokemons = Pokemon::take(10)->get();
        // dd($out);
        // error_log('out is '.json_encode($out), 3, 'F:\log\ll.log');
        // return view('pokemon.index', compact('pokemons'));

        // $title = '创建精灵';
        $title = __('messages.pokemons');

        $pokemons = DB::table('pokemon')
            ->leftJoin('pokemon_types as t1', 'pokemon.type1', '=', 't1.id')
            ->leftJoin('pokemon_types as t2', 'pokemon.type2', '=', 't2.id')
            ->select('pokemon.*', 't1.name as type1_name', 't2.name as type2_name', 't1.color as type1_color', 't2.color as type2_color')
            ->get();

        return view('pokemons.index', compact('title', 'pokemons'));

    }

    //show create pokemon's page
    public function create()
    {

        $title = __('messages.create_pokemon');

        $types = PokemonType::all();
        $last_pokemons = DB::table('pokemon')
            ->leftJoin('pokemon_types as t1', 'pokemon.type1', '=', 't1.id')
            ->leftJoin('pokemon_types as t2', 'pokemon.type2', '=', 't2.id')
            ->select('pokemon.*', 't1.name as type1_name', 't2.name as type2_name')
            ->latest()
            ->limit(20)
            ->get();

        $next_noid = $last_pokemons[0]->no_id + 1;
        return view('pokemons.create', compact('title', 'types', 'last_pokemons', 'next_noid'));
    }

    //store pokemon information
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_id' => 'required',
            'name' => 'required|max:20',
            'name_en' => 'max:20',
            'type1' => 'required',
        ]);

        $pokemon = Pokemon::create([
            'no_id' => $request->no_id,
            'name' => trim($request->name),
            'name_en' => trim($request->name_en),
            'type1' => $request->type1,
            'type2' => $request->type2,
        ]);

        if($pokemon){
            session()->flash('success', '成功创建Pokemon '.$pokemon->name);
            return redirect()->route('pokemons.create');
        }else{
            session()->flash('fail', '创建失败');
            return redirect()->route('pokemons.create');
        }
    }
}
