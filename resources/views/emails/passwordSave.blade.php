<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recupera tu contraseña</title>
</head>
<body>
    <p>Hola {{$user->name}} {{$user->lastname_pat}}, lamentamos mucho que hayas olvidado tu contraseña</p>
    <p>tu nueva contraseña para poder acceder a tu cuenta de API Rick and Morty es la siguiente:</p>
    <p><h1>{{Crypt::decryptString($user->password)}}</h1></p>
</body>
</html>
