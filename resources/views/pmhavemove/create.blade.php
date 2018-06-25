@extends('layouts.default')
@section('title', $title)
@section('content')
    <style media="screen">
        .short{
            width: 20%;
        }
        .long{
            width: 60%;
        }
        .showMove{
            text-align: center;
            font-size: 14px;
        }
        .showTable{
            width: 100%;
        }
        .showTable tr th{
            border: 1px solid #000;
        }
        .showTable tr td{
            border: 1px solid #000;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function()
        {
            //pokemon 's type change show this class pokemons
            $("#p_t").change(function()
            {
                var type = $(this).val();
                if(type){
                    $.get("/getPokemonMvByType/"+type, function(data, status)
                    {
                        $('#pokemon').empty();
                        var pokemons = data.messages['pokemons'];
                        var pm_moves = data.messages['pm_moves'];
                        for (var i = 0; i < pokemons.length; i++)
                        {
                            $('#pokemon').append("<option value='"+ pokemons[i].id +"'>"+ pokemons[i].name +"</option>");
                        }

                        $('.pmhaveMove').empty();
                        $('.pmhaveMove').append("<td>"+pm_moves.no_id+"</td>");
                        $('.pmhaveMove').append("<td>"+pm_moves.name+"</td>");
                        var mv_name = pm_moves.mv_name == null ? "@lang('messages.null')" : pm_moves.mv_name;
                        $('.pmhaveMove').append("<td>"+mv_name+"</td>");
                    });
                }
            });

            //move 's type change show this class moves
            $("#m_t").change(function()
            {
                var type = $(this).val();
                if(type){
                    $.get("/getMoveByType/"+type, function(data, status)
                    {
                        $('#move').empty();
                        var all = data.data;
                        for (var i = 0; i < all.length; i++)
                        {
                            $('#move').append("<option value='"+ all[i].id +"'>"+ all[i].name +"</option>");
                        }
                    });
                }
            });

            //show a pokemon have moves
            $("#pokemon").change(function()
            {
                var pokemon = $(this).val();
                if(pokemon){
                    $.get("/getPmMove/"+pokemon, function(data, status)
                    {
                        $('#move').empty();
                        var all = data.messages;

                        $('.pmhaveMove').empty();
                        $('.pmhaveMove').append("<td>"+all[0].no_id+"</td>");
                        $('.pmhaveMove').append("<td>"+all[0].name+"</td>");
                        var mv_name = all[0].mv_name == null ? "@lang('messages.null')" : all[0].mv_name;
                        $('.pmhaveMove').append("<td>"+mv_name+"</td>");
                    });
                }
            });

            //submit information for database
            $("#submit").click(function()
            {
                var pokemon = $('#pokemon').val();
                var move = $('#move').val();
                if(pokemon && move){
                    var csrf = $('[name="_token"]').val();
                    $.post("/phavem/aj_store", {'_token': csrf,'pokemon': pokemon, 'move': move}, function(data, status)
                    {
                        alert(data.message);
                    });
                }
            });

        });
    </script>
    <div class="col-md-offset-2 col-md-8 col-lg-offset-4 col-lg-4">
        <h1>@lang('messages.create_pmhavemv')</h1>
        <div class="panel-body">
            @include('shared._errors')
            <form class="" action="{{ route('phavem.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="pokemon">@lang('messages.pokemons')</label>
                    <select class="form-control" id="p_t">
                        <option value="0" selected="selected">@lang('messages.all')</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <br/>
                    <select class="form-control" name="pokemon" id="pokemon">
                        @foreach($pokemons as $pokemon)
                            <option value="{{ $pokemon->id }}">{{ $pokemon->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="move">@lang('messages.move')</label>
                    <select class="form-control" id="m_t">
                        <option value="0" selected='selected'>@lang('messages.all')</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <br/>
                    <select class="form-control" name="move" id="move">
                        @foreach($moves as $move)
                            <option value="{{ $move->id }}">{{ $move->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="btn btn-primary" id="submit">@lang('messages.submit')</button>
            </form>
        </div>
    </div>
    <div class="col-md-offset-2 col-md-8 col-lg-offset-2 col-lg10 showMove">
        <table class="showTable">
            <tr>
                <th class="short">@lang('messages.number')</th>
                <th class="short">@lang('messages.name')</th>
                <th class="long">@lang('messages.move')</th>
            </tr>
            <tr class="pmhaveMove">
            </tr>
        </table>
    </div>
@stop
