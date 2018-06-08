@extends('layouts.default')
@section('title', '所有属性')

@section('content')
<style>
    .type ul{ list-style:none; padding:0px; margin:0px; width:60%;
height:30px; line-height:30px;
border-top:0px; font-size:12px;}

    .type ul li{ display:block; width:5.2%; float:left;text-indent:0em;border: 1px solid #99CC00; text-align: center;}
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
                <li>{{$type->name}}</li>
                <li>{{$type->normal == 1 ? '&nbsp;' : $type->normal}}</li>
                <li>{{$type->fire == 1 ? '&nbsp;' : $type->fire}}</li>
                <li>{{$type->water == 1 ? '&nbsp;' : $type->water}}</li>
                <li>{{$type->grass == 1 ? '&nbsp;' : $type->grass}}</li>
                <li>{{$type->electr == 1 ? '&nbsp;' : $type->electr}}</li>
                <li>{{$type->ice == 1 ? '&nbsp;' : $type->ice}}</li>
                <li>{{$type->fight == 1 ? '&nbsp;' : $type->fight}}</li>
                <li>{{$type->poison == 1 ? '&nbsp;' : $type->poison}}</li>
                <li>{{$type->ground == 1 ? '&nbsp;' : $type->ground}}</li>
                <li>{{$type->flying == 1 ? '&nbsp;' : $type->flying}}</li>
                <li>{{$type->psychic == 1 ? '&nbsp;' : $type->psychic}}</li>
                <li>{{$type->bug == 1 ? '&nbsp;' : $type->bug}}</li>
                <li>{{$type->rock == 1 ? '&nbsp;' : $type->rock}}</li>
                <li>{{$type->ghost == 1 ? '&nbsp;' : $type->ghost}}</li>
                <li>{{$type->dragon == 1 ? '&nbsp;' : $type->dragon}}</li>
                <li>{{$type->dark == 1 ? '&nbsp;' : $type->dark}}</li>
                <li>{{$type->steel == 1 ? '&nbsp;' : $type->steel}}</li>
                <li>{{$type->fairy == 1 ? '&nbsp;' : $type->fairy}}</li>
            </ul>
        @endforeach
    </div>
</div>
@stop
