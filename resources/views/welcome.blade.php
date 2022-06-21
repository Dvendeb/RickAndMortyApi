@extends('layouts.layout')
@section('title')
    <title>Rick and Morty</title>
@endsection

@section('css')
@endsection

@section('content')
    <style>
        .bg-container{
            background: rgba(0,0,0,0.80);
        }
    </style>
    <body style="background-image: url({{asset('images/fond.jpg')}});background-attachment: fixed; background-size: cover;  ">
    <div class="container bg-container col-10 mt-5 text-white p-5">
        <h1 class="text-center" style="font-family:rick-font;">API RICK AND MORTY</h1>
        <h5 class="text-center" style="font-family:rick-font;">En esta api podras encontrar algunos personajes que aparecen en la serie de rick and morty</h5>
        <img class=" rounded img-thumbnail" src="{{asset('images/rickandmorty.jpg')}}" alt="">
        <h4 class="text-white text-center mt-5">Inicia dando click en:</h4>
        <a  href="http://127.0.0.1:8000/api/personajes">
            <h4 class="text-white text-center mt-1">>iniciar<</h4>
        </a>
    </div>
    </body>

@endsection

