@extends('layouts.layout')
@section('title')
    <title>Documentacion</title>
@endsection

@section('css')
@endsection

@section('content')
    <style>
        .color-title{
            color:#0EC8C0;
        }
        .color-body{
            color:#74E30C;
        }
        .bg-card{
            background: rgba(44, 43, 39, 0.7);
        }
    </style>
    <body style="background-image: url({{asset('images/fondo.jpg')}}); background-attachment: fixed; background-size: cover;">
    <div class="container mt-5">
        <h1 class="text-white text-center">USO LINKS</h1>
        <h3 class="text-white">Personajes</h3>
        <div class="card bg-card mt-5">
            <div class="card-head border-bottom border-dark p-2">
                <h3 class="color-title"> Mostrar todos</h3>
                <h5 class="color-title"> /api/personajes</h5>
            </div>
            <div class="card-body">
                <h5 class="color-body">[<br>
                    {<br>
                    "id": 1,<br>
                    "name": "Rick Sanchez",<br>
                    "status": "Vivo",<br>
                    "specie": "Humano",<br>
                    "gender": "Masculino",<br>
                    "origin": "Tierra"<br>
                    }, etc </h5>
            </div>
        </div>
        <div class="card bg-card mt-5">
            <div class="card-head border-bottom border-dark p-2">
                <h3 class="color-title"> Mostrar id</h3>
                <h5 class="color-title"> /api/personajes/5</h5>
            </div>
            <div class="card-body">
                <h5 class="color-body">{<br>
                    "id": 5,<br>
                    "name": "Jerry Smith",<br>
                    "status": "Alive",<br>
                    "specie": "Human",<br>
                    "gender": "Male",<br>
                    "origin": "Earth (Replacement Dimension)"<br>
                    }
                </h5>
            </div>
        </div>
        <table class="table bg-card mt-5 text-white col-10">
            <thead>
            <tr>
                <th scope="col">Key</th>
                <th scope="col">Tipo</th>
                <th scope="col">Descripcion</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>id</td>
                <td>int</td>
                <td>id del personaje en el registro</td>
            </tr>
            <tr>
                <td >name</td>
                <td>string</td>
                <td>nombre del personaje</td>
            </tr>
            <tr>
                <td>status</td>
                <td>string</td>
                <td>si el personaje esta vivo muerto o se desconoce</td>
            </tr>
            <tr>
                <td>specie</td>
                <td>string</td>
                <td>la especie que es el personaje</td>
            </tr>
            <tr>
                <td>gender</td>
                <td>string</td>
                <td>genero del personaje</td>
            </tr>
            <tr>
                <td>origen</td>
                <td>string</td>
                <td>de donde es originario el personaje</td>
            </tr>
            </tbody>
        </table>

        <h3 class="text-white mt-5">Episodios</h3>
        <div class="card bg-card mt-5">
            <div class="card-head border-bottom border-dark p-2">
                <h3 class="color-title"> Mostrar todos</h3>
                <h5 class="color-title"> /api/episodios</h5>
            </div>
            <div class="card-body">
                <h5 class="color-body">[<br>
                    {<br>
                    "id": 1,<br>
                    "name": "Pilot",<br>
                    "air_date": "December 2, 2013",<br>
                    "episode": "S01E01"<br>
                    }, etc</h5>
            </div>
        </div>
        <div class="card bg-card mt-5">
            <div class="card-head border-bottom border-dark p-2">
                <h3 class="color-title"> Mostrar id</h3>
                <h5 class="color-title"> /api/episodios/5</h5>
            </div>
            <div class="card-body">
                <h5 class="color-body">{<br>
                    "id": 8,<br>
                    "name": "Close Rick-counters of the Rick Kind",<br>
                    "air_date": "April 7, 2014",<br>
                    "episode": "S01E10"<br>
                    }
                </h5>
            </div>
        </div>
        <table class="table bg-card mt-5 text-white col-10">
            <thead>
            <tr>
                <th scope="col">Key</th>
                <th scope="col">Tipo</th>
                <th scope="col">Descripcion</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>id</td>
                <td>int</td>
                <td>id del episodio registrado</td>
            </tr>
            <tr>
                <td >name</td>
                <td>string</td>
                <td>nombre del episodio</td>
            </tr>
            <tr>
                <td>air_date</td>
                <td>string</td>
                <td>fecha en que se publico el episodio</td>
            </tr>
            <tr>
                <td>episode</td>
                <td>string</td>
                <td>estructura del episodio</td>
            </tr>
            </tbody>
        </table>
    </div>
    </body>

@endsection

