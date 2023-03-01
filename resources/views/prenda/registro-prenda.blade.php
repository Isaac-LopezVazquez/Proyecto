<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
<a href="{{ route('prenda.index') }}">Ver prendas registradas</a>
<h1>Registro de prendas</h1>
<form action="{{ route('prenda.store') }}" method='POST'>
    @csrf
    
    <label for="tipo">Tipo</label><br>
    <input type='text' name='tipo' id='tipo'><br>
    @error('tipo')
        <h4>{{ $message}}</h4>
    @enderror
    <br>
    <label for="color">Color</label><br>
    <input type='text' name='color' id='color'><br>
    @error('color')
        <h4>{{ $message}}</h4>
    @enderror
    <br>
    <label for="talla">Talla</label><br>
    <input type='number' name='talla' id='talla'><br>
    @error('talla')
        <h4>{{ $message}}</h4>
    @enderror
    <br>

    <label for="costo">Costo</label><br>
    <input type='number' name='costo' id='costo'><br>
    @error('costo')
        <h4>{{ $message}}</h4>
    @enderror
    <br>
    
    <input type='submit' value='Enviar'>


    </form>
</body>
</html>