<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    @yield('title')
    @yield('css')

    <style>
        .sizelogo{
            width:80px;
            height:80px;
        }
        .bg-black{
            background-color: black;
        }
        .bg-blue-rick{
            background-color: #0EC8C0;
            border:solid 3px #74E30C;
        }

    </style>
    <link rel="icon" class="rounded-circle" href="{{asset('images/icon.png')}}">

    <header class=" bg-black text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0">
                    <img class="sizelogo" src="{{asset('images/logoPage.jpg')}}" alt="">
                </a>
                <div class="col-8">

                </div>

                <div class="text-end">
                    <a type="button" class="btn bg-blue-rick m-3" href="/Documentacion">Document</a>
                </div>
            </div>
        </div>
    </header>

</head>
<body >

@yield('content')

<footer class="text-center text-white bg-black p-0" >
    <div class="container">
        </section>

        <hr class="my-5" />

        <!-- Section: Text -->
        <section class="mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <p>
                        API creada por:
                        Ochoa Martínez Diego Armando,
                        González Luna Julia Yamile,
                        Peréz Luna Luis Fernando,
                        Luna Flores Alan Omar,
                        Aleman Elizalde Brandon Jesus,
                        Robles Flores Aaron,
                        Martínez Olmos Lucero.
                    </p>
                </div>
            </div>
        </section>
    </div>

    <div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2020 Copyright
    </div>
    <!-- Copyright -->
</footer>
@yield('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
