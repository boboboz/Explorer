@extends('layouts.default')
@section('title', "$title")
@section('content')
    <style media="screen">


    </style>
    <div class="col-md-offset-2 col-md-8 col-lg-offset-0 col-lg-12 moves">
        @include("div_part._divpart")
        <table class="showTable">
            <tr>
                <th class="moves_short">@lang('messages.name')</th>
                <th class="moves_short">@lang('messages.name_en')</th>
                <th class="moves_short"><a href="/moves/type">@lang('messages.type')</a></th>
                <th class="moves_short"><a href="/moves/atk">@lang('messages.atk')</a></th>
                <th class="moves_short"><a href="/moves/cd">@lang('messages.cd')</a></th>
                <th class="moves_long">@lang('messages.description')</th>
            </tr>
            @foreach($moves as $move)
                <tr>
                    <td class="moves_short">{{ $move->name }}</td>
                    <td class="moves_short">{{ $move->name_en }}</td>
                    <td class="moves_short" style="background-color:{{$move->color}}">{{ $move->t_name }}</td>
                    <td class="moves_short">{{ $move->atk }}</td>
                    <td class="moves_short">{{ $move->cd }}</td>
                    <td class="moves_long">{{ $move->description }}</td>
                </tr>
            @endforeach
        </table>
        <div class="pagelink">
            {{ $moves->links() }}
        </div>

    </div>
@stop
