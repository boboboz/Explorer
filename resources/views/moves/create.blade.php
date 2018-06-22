@extends('layouts.default')
@section('title', "$title")
@section('content')
    <script type="text/javascript">
        $(document).ready(function(){
            $("[name='name']").blur(function(){
                var name = $(this).val();
                // $.post("checkmove", {'_token':'{{csrf_token()}}','name': name}, function(data,status){
                //     alert("Data: " + data + "\nStatus: " + status);
                // });
                if(name){
                    $.get("/checkmove/"+name, function(data, status){
                        // alert("Data: " + data.status + "\nStatus: " + status);
                        if(data.status){
                            alert('success');
                        }else{
                            alert('exist');
                        }
                    });
                }
            });
        });
    </script>
    <div class="col-md-offset-2 col-md-8 col-lg-offset-4 col-lg-4">
        <h1>@lang('messages.create_move')</h1>
        <div class="panel-body">
            <form action="{{ route('moves.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">@lang('messages.name')</label>
                    <input id="test" type="text" name="name" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="name_en">@lang('messages.name_en')</label>
                    <input type="text" name="name_en" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="atk">@lang('messages.atk')</label>
                    <input type="text" name="atk" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="cd">@lang("messages.cd")</label>
                    <input type="text" name="cd" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="type">@lang("messages.type")</label>
                    <select name="type" class="form-control">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">@lang("messages.description")</label>
                    <input type="text" name="description" value="" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary">@lang('messages.submit')</button>
            </form>
        </div>
    </div>
@stop
