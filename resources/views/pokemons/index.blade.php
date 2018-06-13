@extends('layouts.default')
@section('title', 'Pokemons')
@section('content')
    <style>
        .pokemons ul{ list-style:none; padding:0px; margin:0px; width:60%;
    height:30px; line-height:30px;
    border-top:0px; font-size:12px;}

        .pokemons ul{margin: auto;}
        .pokemons ul li{ display:block; width:20%; float:left;text-indent:0em;border: 1px solid #99CC00; text-align: center;}
        .pokemons .th{ background:#F1FADE; font-weight:bold; border-top:1px;}
    </style>
    <div class="col-md-offset-2 col-md-8 col-lg-offset-0 col-lg-12 pokemons">
        <h1>Pokemons</h1>
            <ul class="th">
                <li>NO</li>
                <li>名称</li>
                <li>英文名称</li>
                <li>属性1</li>
                <li>属性2</li>
            </ul>
            <ul>
                @foreach($pokemons as $pokemon)
                    <li>{{ sprintf("%03d", $pokemon->no_id) }}</li>
                    <li>{{ $pokemon->name }}</li>
                    <li>{{ $pokemon->name_en }}</li>
                    <li>{{ $pokemon->type1_name }}</li>
                    <li>{{ $pokemon->type2_name == '' ? "&nbsp;" : $pokemon->type2_name }}</li>
                @endforeach
            </ul>
    </div>
@stop
