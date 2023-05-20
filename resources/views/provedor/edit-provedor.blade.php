<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css_plantilla/styles.min.css') }}">
    <title>Editar Provedor</title>
</head>

<body>
    <x-layout />
    <div class="container">
        <div class="row">
            <div class="card">
                <h5>Agregar Provedor</h5>
                <div class="card-body">
                    <form action="{{ route('provedor.update', $provedor) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row justify-content-evenly">
                            <div class="col-4">
                                <label for="nombreP" class="form-label">Nombre Provedor</label>
                                <input type="text" class="form-control" id="" aria-describedby="NombreProvedor" name="nombreP" value="{{ old('nombreP') ?? $provedor->nombreP }}" pattern="[A-Za-z ]+" >
                                @error('nombreP')
                                <h4>{{ $message }}</h4>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="direccion" class="form-label">Direccion del Provedor</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Direccion" name="direccion" value="{{ old('direccion') ?? $provedor->direccion }}">
                                @error('direccion')
                                <h4>{{ $message }}</h4>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="number" class="form-control" id="" aria-describedby="Telefono" name="telefono" value="{{ old('telefono') ?? $provedor->telefono}}">
                                @error('telefono')
                                <h4>{{ $message }}</h4>
                                @enderror
                            </div>
                        </div>
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="{{ asset('/js_plantilla/sidebarmenu.js') }}"></script>
<script src="{{ asset('/js_plantilla/app.min.js') }}"></script>
<script src="{{ asset('/js_plantilla/dashboard.js') }}"></script>
<script src="{{ asset('/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('/libs/simplebar/dist/simplebar.js') }}"></script>

</html>