@extends('layouts.default')
@section('title', '所有属性')

@section('content')
<div class="col-md-offset-2 col-md-8">
    <h1>所有属性</h1>
    <div>
        @foreach ($pokemontypes as $type)
            <ul>
                {{$type->name}}
            </ul>
        @endforeach
    </div>
</div>
@stop
