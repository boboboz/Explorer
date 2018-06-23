@extends('layouts.default')
@section('title', $title)
@section('content')
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#p_t").change(function()
            {
                var type = $(this).val();
                if(type){
                    $.get("/getPokemonByType/"+type, function(data, status)
                    {
                        $('#pokemon').empty();
                        var all = data.data;
                        for (var i = 0; i < all.length; i++)
                        {
                            $('#pokemon').append("<option value='"+ all[i].id +"'>"+ all[i].name +"</option>");
                        }
                    });
                }
            });

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

            $("#submit").click(function()
            {
                var pokemon = $('#pokemon').val();
                var move = $('#move').val();
                if(pokemon && move){
                    var csrf = $('[name="_token"]').val();
                    $.post("/phavem/aj_store", {'_token': csrf,'pokemon': pokemon, 'move': move}, function(data, status)
                    {
                        alert(data.message);
                        // $('#move').empty();
                        // var all = data.data;
                        // for (var i = 0; i < all.length; i++)
                        // {
                        //     $('#move').append("<option value='"+ all[i].id +"'>"+ all[i].name +"</option>");
                        // }
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
@stop
