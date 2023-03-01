<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body>
    <h1>Prenda individual</h1>
    <li> Tipo: {{ $prenda->tipo }} // Color: {{ $prenda->color }} // Talla: {{ $prenda->talla }} // Costo: {{ $prenda->costo }}</li>
    <a href="{{ route('prenda.index') }}">Ver prendas registradas</a>
</body>
</html>