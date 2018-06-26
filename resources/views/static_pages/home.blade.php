@extends('layouts.default')
@section('title', $title)
@section('content')
    <style media="screen">
        button{
            width: 100%;
            height: 200px;
            border-radius: 20px;
            border: 2px solid #000;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#pokemons').on('click', function(){
                window.location.href="/pokemons";
            });
            $('#moves').on('click', function(){
                window.location.href="/moves";
            });
            $('#phavem').on('click', function(){
                window.location.href="/phavem";
            });
        });

    </script>
  <div class="jumbotron">
    <h1>@lang('messages.hello_pokemon_trainer')</h1>
    <br/>
    <div class="row">
        <div class="col-lg-4 first">
            <button id="pokemons" type="button" name="button" >@lang('messages.pokemons')</button>
        </div>
        <div class="col-lg-4 second">
            <button id="moves" type="button" name="button">@lang('messages.move_list')</button>
        </div>
        <div class="col-lg-4 third">
            <button id="phavem" type="button" name="button">@lang('messages.list_pmhavemv')</button>
        </div>
    </div>

    <!-- <p class="lead">
      你现在所看到的是 <a href="https://fsdhub.com/books/laravel-essential-training-5.1">Laravel 入门教程</a> 的示例项目主页。
    </p> -->
    <!-- <p>
      一切，将从这里开始。
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="{{route('signup')}}" role="button">现在注册</a>
    </p> -->
  </div>
@stop
