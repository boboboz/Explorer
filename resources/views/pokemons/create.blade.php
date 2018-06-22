@extends('layouts.default')
@section('title', "$title")
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
                    <label for="no_id">@lang('messages.number')</label>
                    <input type="text" name="no_id" class="form-control" value="{{$next_noid}}">
                </div>
                <div class="form-group">
                    <label for="name">@lang('messages.name')</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="name_en">@lang('messages.name_en')</label>
                    <input type="text" name="name_en" class="form-control" value="{{old('name_en')}}">
                </div>
                <div class="form-group">
                    <label for='type1'>@lang('messages.type1')</label>
                    <!-- <input type="select" name="type1" class="form-control" value=""> -->
                    <select name="type1" class="form-control">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for='type2'>@lang('messages.type2')</label>
                    <select name="type2" class="form-control">
                        <option value="" selected='selected'>空</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">@lang('messages.submit')</button>
            </form>
            <div>
                <h1>
                    @lang('messages.recently_added_pokemons')
                </h1>
                <div class="pokemons">
                    <ul class='th'>
                        <li>@lang('messages.number')</li>
                        <li>@lang('messages.name')</li>
                        <li>@lang('messages.name_en')</li>
                        <li>@lang('messages.type1')</li>
                        <li>@lang('messages.type2')</li>
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
