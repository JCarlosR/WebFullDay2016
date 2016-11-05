<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .logo {
            width: 100px;
            height: 53px;
        }
    </style>
</head>
<body>
    <img src="http://www.redgesam.cl/wp2/wp-content/uploads/2013/06/email-sticker.jpg" class="logo">
    <p><strong>Nombre: </strong>{{ $name }}</p>
    <p><strong>Correo: </strong>{{ $email }}</p>
    <p><strong>Mensaje: </strong>{{ $mensaje }}</p>

</body>
</html>