@extends('layouts.default')
@section('title', '所有属性')

@section('content')
<style>
    .type ul{ list-style:none; padding:0px; margin:0px; width:60%;
height:20px; line-height:20px; border:1px solid #99CC00;
border-top:0px; font-size:12px;}

    .type ul li{ display:block; width:5.2%; float:left;text-indent:0em;}
    .type .th{ background:#F1FADE; font-weight:bold; border-top:1px }
</style>
<div class="col-md-offset-2 col-md-8 col-lg-offset-0 col-lg-12">
    <h1>所有属性</h1>
    <div class="type">
        <ul class="th">
            <li>&nbsp;</li>
            @foreach ($pokemontypes as $type)
                <li>{{$type->name}}</li>
            @endforeach
        </ul>
        @foreach ($pokemontypes as $type)
            <ul>
                <li>
                    {{$type->name}}
                </li>
            </ul>
        @endforeach
    </div>
</div>
@stop
