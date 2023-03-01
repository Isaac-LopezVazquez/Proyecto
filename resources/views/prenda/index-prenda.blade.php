<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>
</head>
<body>
<a href="{{ route('prenda.create') }}">Registrar prenda</a>
    <h1>Prendas registradas</h1>
    @foreach( $prenda as $p)
        <li> Tipo: {{ $p->tipo }} // Color: {{ $p->color }} // Talla: {{ $p->talla }} // Costo: {{ $p->costo }}</li>
        <a href="/prenda/{{$p->id}}">Ver detalles</a>
        <a href="/prenda/{{$p->id}}/edit"> Editar</a>


    @endforeach
</body>
</html>