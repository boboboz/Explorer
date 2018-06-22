@extends('layouts.default')
@section('title', "$title")
@section('content')
    <style media="screen">
        .moves tr{
            padding: 0px;
            margin: auto;
            height: 30px;
            line-height: 30px;
            width: 100%;
            font-size:12px;
        }
        .moves tr th{
            border: 1px solid #000;
            text-indent:0em;
            text-align: center;
        }
        .moves tr td{
            border: 1px solid #000;
            text-indent:0em;
            text-align: center;
        }
        .short{
            width: 10%;
        }
        .long{
            width: 50%;
        }
        .pagelink{
            width: 100%;
            display:flex;
            justify-content:center;
            align-items:center;
        }
    </style>
    <div class="col-md-offset-2 col-md-8 col-lg-offset-0 col-lg-12 moves">
        <h1>@lang('messages.move_list')</h1>
        <table>
            <tr>
                <th class="short">@lang('messages.name')</th>
                <th class="short">@lang('messages.name_en')</th>
                <th class="short">@lang('messages.type')</th>
                <th class="short">@lang('messages.atk')</th>
                <th class="short">@lang('messages.cd')</th>
                <th class="long">@lang('messages.description')</th>
            </tr>
            @foreach($moves as $move)
                <tr>
                    <td class="short">{{ $move->name }}</td>
                    <td class="short">{{ $move->name_en }}</td>
                    <td class="short" style="background-color:{{$move->color}}">{{ $move->t_name }}</td>
                    <td class="short">{{ $move->atk }}</td>
                    <td class="short">{{ $move->cd }}</td>
                    <td class="long">{{ $move->description }}</td>
                </tr>
            @endforeach
        </table>
        <div class="pagelink">
            {{ $moves->links() }}
        </div>

    </div>
@stop
