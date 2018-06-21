<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PmhaveMove;
use App\Models\Pokemon;
use App\Models\Move;

class PmHaveMoveController extends Controller
{
    public function index(){
        $pmhaveMoves = PmhaveMove::paginate(30);
        return view('PmhaveMove.index', compact('pmhaveMoves'));
    }

    public function create(){
        $pokemons = Pokemon::all();
        $moves = Move::all();
        return view('PmhaveMove.create', compact('pokemons', 'moves'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'p_id' => 'required',
            'm_id' => 'required',
        ]);

        $pmhaveMove = PmhaveMove::create([
            'p_id' => $request->p_id,
            'm_id' => $request->m_id,
        ]);

        if($pmhaveMove){
            session()->flash('success', 'congratulation create relation about pokemon and move');
            return redirect()->route('PmHaveMove.create');
        }else {
            session()->flash('fail', 'create fail');
            return redirect()->route('PmHaveMove.create');
        }
    }
}
