<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StormTimer;

class StormTimerController extends Controller
{

    public function index(){
        $lastTime = StormTimer::last();
        echo $lastTime;

    }

    public function store(){
        $user = StormTimer::create([
            // 'name' => $request->name,
            // 'email' => $request->email,
            // 'password' => bcrypt($request->password),
            'content1' => 'test1',
            'content2' => 'test2',
            'content3' => 'test3',
        ]);

        return redirect('/');
    }

}
