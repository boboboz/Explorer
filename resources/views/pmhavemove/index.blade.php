@extends('layouts.default')
@section('title', $title)
@section('content')
    <style media="screen">
        .number{
            width: 10%;
        }
        .short{
            width: 20%;
        }
        .long{
            width: 70%;
        }
        .showTable{
            width: 100%;
            text-align: center;
            font-size: 14px;
        }
        .showTable tr th{
            border: 1px solid #000;
        }
        .showTable tr td{
            border: 1px solid #000;
        }
    </style>
    <div class="col-md-offset-2 col-md-8 col-lg-offset-0 col-lg-12">
        <h1>@lang('messages.list_pmhavemv')</h1>
        <table class="showTable">
            <tr>
                <th class="number">@lang('messages.number')</th>
                <th class="short">@lang('messages.name')</th>
                <th class="long">@lang('messages.move')</th>
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
