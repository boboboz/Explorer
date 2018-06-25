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
        $title = __('messages.list_pmhavemv');

        $pmMoves = DB::table('pokemon as p')
            ->leftJoin('pmhave_moves as pmm', 'p.no_id', '=', 'pmm.p_id')
            ->leftJoin('moves as m', 'm.id', '=', 'pmm.m_id')
            ->selectRaw('p.no_id, p.name, group_concat(m.name) as mv_name')
            ->groupBy('p.no_id', 'p.name')
            ->orderBy('p.no_id')
            // ->orderBy('pmm.m_id')
            // ->having('p.no_id', '=', $p_id)
            ->get();
        return view('PmhaveMove.index', compact('title', 'pmMoves'));
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
     * get pokemon by type and get first pokemon's move
     * @author liuyunbo
     * @param  [type] $type_id [description]
     * @return [type]          [description]
     */
    public function getPokemonAndMoveByType($type_id)
    {
        if($type_id != 0){
            $pokemons = Pokemon::where('type1', '=', $type_id)
                ->orWhere('type2', '=', $type_id)
                ->get();
        }else{
            $pokemons = Pokemon::all();
        }

        $p_id = $pokemons[0]->no_id;
        $pmMoves = DB::table('pokemon as p')
            ->leftJoin('pmhave_moves as pmm', 'p.no_id', '=', 'pmm.p_id')
            ->leftJoin('moves as m', 'm.id', '=', 'pmm.m_id')
            // ->select('p.name as p_name', 'm.name as m_name')
            ->selectRaw('p.no_id, p.name, group_concat(m.name) as mv_name')
            // ->where('p.no_id', '=', $p_id)
            ->groupBy('p.no_id', 'p.name')
            ->having('p.no_id', '=', $p_id)
            ->get();

        $messages['pokemons'] = $pokemons;
        $messages['pm_moves'] = $pmMoves[0];

        return response()->json([
            'messages' => $messages,
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

    /**
     * ajax store pm information
     * @author liuyunbo
     * @param  Request $request [description]
     * @return [type]           [description]
     */
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

    /**
     * get pokemon have moves
     * @author liuyunbo
     * @param  [type] $p_id [description]
     * @return [type]       [description]
     */
    public function getPokemonMove($p_id)
    {
        $pmMoves = DB::table('pokemon as p')
            ->leftJoin('pmhave_moves as pmm', 'p.no_id', '=', 'pmm.p_id')
            ->leftJoin('moves as m', 'm.id', '=', 'pmm.m_id')
            // ->select('p.name as p_name', 'm.name as m_name')
            ->selectRaw('p.no_id, p.name, group_concat(m.name) as mv_name')
            // ->where('p.no_id', '=', $p_id)
            ->groupBy('p.no_id', 'p.name')
            ->having('p.no_id', '=', $p_id)
            ->get();
        $errno = 0;
        if(!$pmMoves){
            $errno = 1;
        }
        return response()->json([
            'errno' => $errno,
            'messages' => $pmMoves,
        ]);
    }


}
