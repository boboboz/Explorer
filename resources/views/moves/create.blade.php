@extends('layouts.default')
@section('title', '创建技能')
@section('content')
    <div class="col-md-offset-2 col-md-8 col-lg-offset-4 col-lg-4">
        <h1>创建技能</h1>
        <div class="panel-body">
            <form action="{{ route('moves.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="name_en">name_en</label>
                    <input type="text" name="name_en" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="atk">ATK</label>
                    <input type="text" name="atk" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="cd">CD</label>
                    <input type="text" name="cd" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" class="form-control">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" value="" class="form-control" >
                </div>
            </form>
        </div>
    </div>
@stop
