<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PmhaveMove;
use App\Models\Pokemon;
use App\Models\Move;
use App\Models\PokemonType;
use Illuminate\Support\Facades\DB;

class PmHaveMoveController extends Controller
{
    public function index(){
        $pmhaveMoves = PmhaveMove::paginate(30);
        return view('PmhaveMove.index', compact('pmhaveMoves'));
    }

    public function create(){

        $title = __('messages.create_pmhavemv');
        $types = PokemonType::all();
        $pokemons = Pokemon::all();
        $moves = Move::all();
        return view('PmhaveMove.create', compact('title', 'pokemons', 'moves', 'types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'pokemon' => 'required',
            'move' => 'required',
        ]);

        $pmhaveMove = PmhaveMove::create([
            'p_id' => $request->pokemon,
            'm_id' => $request->move,
        ]);

        if($pmhaveMove){
            session()->flash('success', 'congratulation create relation about pokemon and move');
            return redirect()->route('phavem.create');
        }else {
            session()->flash('fail', 'create fail');
            return redirect()->route('phavem.create');
        }
    }

    /**
     * get pokemon by type
     * @author liuyunbo
     * @param  [type] $type_id [description]
     * @return [type]          [description]
     */
    public function getPokemonByType($type_id)
    {
        if($type_id != 0){
            $pokemons = Pokemon::where('type1', '=', $type_id)
                ->orWhere('type2', '=', $type_id)
                ->get();
        }else{
            $pokemons = Pokemon::all();
        }


        return response()->json([
            'data' => $pokemons,
            'status' => 'success'
        ]);
    }

    /**
     * get move by type
     * @author liuyunbo
     * @param  [type] $type_id [description]
     * @return [type]          [description]
     */
    public function getMoveByType($type_id)
    {
        if($type_id != 0){
            $moves = Move::where('type', '=', $type_id)
                ->get();
        }else {
            $moves = Move::all();
        }

        return response()->json([
            'data' => $moves,
            'status' => 'success'
        ]);
    }

    public function ajaxStore(Request $request)
    {
        $this->validate($request, [
            'pokemon' => 'required',
            'move' => 'required',
        ]);

        $pmhaveMove = PmhaveMove::create([
            'p_id' => $request->pokemon,
            'm_id' => $request->move,
        ]);

        if($pmhaveMove){
            session()->flash('success', 'congratulation create relation about pokemon and move');
            // return redirect()->route('phavem.create');
            return response()->json([
                'errno' => 0,
                'message' => 'create success'
            ]);
        }else {
            session()->flash('fail', 'create fail');
            // return redirect()->route('phavem.create');
            return response()->json([
                'errno' => 1,
                'message' => 'create fail'
            ]);
        }
    }



}
