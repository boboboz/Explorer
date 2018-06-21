@extends('layouts.default')
@section('title', '创建Pokemon')
@section('content')
    <style>
        .pokemons ul{ list-style:none; padding:0px; margin:0px; width:100%;
    height:30px; line-height:30px;
    border-top:0px; font-size:12px;}

        .pokemons ul{margin: auto;}
        .pokemons ul li{ display:block; width:20%; float:left;text-indent:0em;border: 1px solid #99CC00; text-align: center;}
        .pokemons .th{ background:#F1FADE; font-weight:bold; border-top:1px;}
    </style>
    <div class="col-md-offset-2 col-md-8 col-lg-offset-4 col-lg-4">
        <h1> @lang('messages.create_pokemon')</h1>
        <div class="panel-body">
            <form method="POST" action="{{ route('pokemons.store')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="no_id">序号</label>
                    <input type="text" name="no_id" class="form-control" value="{{$next_noid}}">
                </div>
                <div class="form-group">
                    <label for="name">名称</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="name_en">英文名称</label>
                    <input type="text" name="name_en" class="form-control" value="{{old('name_en')}}">
                </div>
                <div class="form-group">
                    <label for='type1'>属性1</label>
                    <!-- <input type="select" name="type1" class="form-control" value=""> -->
                    <select name="type1" class="form-control">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for='type2'>属性2</label>
                    <select name="type2" class="form-control">
                        <option value="" selected='selected'>空</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">确认</button>
            </form>
            <div>
                <h1>
                    最近添加的Pokmeon
                </h1>
                <div class="pokemons">
                    <ul class='th'>
                        <li>序号</li>
                        <li>名称</li>
                        <li>英文名称</li>
                        <li>属性1</li>
                        <li>属性2</li>
                    </ul>
                    @foreach($last_pokemons as $pokemon)
                    <ul>
                        <li>{{ sprintf("%03d", $pokemon->no_id) }}</li>
                        <li>{{ $pokemon->name }}</li>
                        <li>{{ $pokemon->name_en }}</li>
                        <li>{{ $pokemon->type1_name }}</li>
                        <li>{{ $pokemon->type2_name == '' ? "&nbsp;" : $pokemon->type2_name }}</li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
