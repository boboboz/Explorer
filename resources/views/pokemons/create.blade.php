@extends('layouts.default')
@section('title', '创建Pokemon')
@section('content')
    <div class="col-md-offset-2 col-md-8 col-lg-offset-4 col-lg-4">
        <h1> 创建pokemon
        </h1>
        <div class="panel-body">
            <form method="POST" action="{{ route('pokemons.store')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="no_id">序号</label>
                    <input type="text" name="no_id" class="form-control" value="{{old('no_id')}}">
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
        </div>
    </div>
@stop
