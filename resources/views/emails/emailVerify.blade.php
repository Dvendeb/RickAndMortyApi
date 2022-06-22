<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifica tu correo Electronico</title>
</head>
<body>
    <p>Hola buen dia {{$user->name}} {{$user->lastname_pat}}, recuerda que para poder seguir accediendo a la api de Rick and morty </p>
    <p>deberas validar tu correo electronico deberas acceder la siguiente clave</p>
    <p> <h1>{{$user->email_verified_at}}</h1></p>

</body>
</html>
