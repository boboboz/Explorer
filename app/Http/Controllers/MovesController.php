<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Move;
use App\Models\PokemonType;

class MovesController extends Controller
{
    public function index()
    {
        $moves = Move::paginate(20)
        return view('moves.index', compact('moves'));
    }

    public function create()
    {
        $types = PokemonType::all();
        return view('moves.create', compact('types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | max:20',
            'name_en' => 'max:30',
            'atk' => 'required',
            'cd' => 'required',
            'type' => 'required',
            'description' => 'required',
        ]);

        $move = Move::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'atk' => $request->atk,
            'cd' => $request->cd,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        if($move){
            session()->flash('success', '成功创建 Move '.$move->name);
            return redirect()->route('moves.create');
        }else {
            session()->flash('fail', '创建失败');
            return redirect()->route('moves.create');
        }
    }
}
