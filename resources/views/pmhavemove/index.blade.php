@extends('layouts.default')
@section('title', $title)
@section('content')
    <style media="screen">

    </style>
    <div class="col-md-offset-2 col-md-8 col-lg-offset-0 col-lg-12">
        @include("div_part._divpart")
        <table class="showTable">
            <tr>
                <th class="phavem_number">@lang('messages.number')</th>
                <th class="phavem_short">@lang('messages.name')</th>
                <th class="phavem_long">@lang('messages.move')</th>
            </tr>
            @foreach($pmMoves as $pmMove)
                <tr class="pmhaveMove">
                    <td>{{ $pmMove->no_id }}</td>
                    <td>{{ $pmMove->name }}</td>
                    <td>{{ $pmMove->mv_name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@stop
