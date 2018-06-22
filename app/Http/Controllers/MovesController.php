<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Move;
use App\Models\PokemonType;
use Illuminate\Support\Facades\DB;

class MovesController extends Controller
{
    public function index()
    {

        $title = __('messages.move_list');

        // $moves = Move::paginate(20);
        $moves = DB::table('moves as m')
            ->leftJoin('pokemon_types as t', 't.id', '=', 'm.type')
            ->select('m.name', 'm.name_en', 'm.atk', 'm.cd', 'm.description', 't.name as t_name', 't.color')
            ->paginate(30);
        return view('moves.index', compact('title', 'moves'));
    }

    public function create()
    {
        $title = __('messages.create_move');

        $types = PokemonType::all();
        return view('moves.create', compact('title', 'types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:moves|max:20',
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

    public function checkMove($name){
        $result = Move::where('name', $name)->firstOrFail();
        $message['data'] = '';
        if($result){
            $message['status'] = false;
            return $message;
        }else{
            $message['status'] = true;
            return $message;
        }
    }
}
