@extends('layouts.default')
@section('title', "$title")
@section('content')
    <style>
        .pokemons ul{ list-style:none; padding:0px; margin:0px; width:60%;
    height:30px; line-height:30px;
    border-top:0px; font-size:12px;}

        .pokemons ul{margin: auto;}
        .pokemons ul li{ display:block; width:20%; float:left;text-indent:0em; border-bottom: 1px solid #000; border-right: 1px solid #000; text-align: center;}
        .pokemons .th{ background:#F1FADE; font-weight:bold; border-top:1px solid #000;}
        .pokemons .first_li{
            border-left: 1px solid #000;
        }
    </style>
    <div class="col-md-offset-2 col-md-8 col-lg-offset-0 col-lg-12 pokemons">
        @include('div_part._divpart')
        <!-- <h1>@lang('messages.pokemons')</h1> -->
            <ul class="th">
                <li class="first_li">@lang('messages.number')</li>
                <li>@lang('messages.name')</li>
                <li>@lang('messages.name_en')</li>
                <li>@lang('messages.type1')</li>
                <li>@lang('messages.type2')</li>
            </ul>
            <ul>
                @foreach($pokemons as $pokemon)
                    <li class="first_li">{{ sprintf("%03d", $pokemon->no_id) }}</li>
                    <li>{{ $pokemon->name }}</li>
                    <li>{{ $pokemon->name_en }}</li>
                    <li style="background-color:{{$pokemon->type1_color}}">{{ $pokemon->type1_name }}</li>
                    <li style="background-color:{{$pokemon->type2_color}}">{{ $pokemon->type2_name == '' ? "&nbsp;" : $pokemon->type2_name }}</li>
                @endforeach
            </ul>
    </div>
@stop
