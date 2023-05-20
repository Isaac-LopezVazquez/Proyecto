<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css_plantilla/styles.min.css') }}">
    <title>Editar Material</title>
</head>

<body>
    <x-layout />
    <div class="container">
        <div class="row">
            <div class="card">
                <h5>Editar Material</h5>
                <div class="card-body">
                    <form action="{{ route('material.update', $material) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="container text-center">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label for="tipoMaterial" class="form-label">Tipo de material</label>
                                    <input type="text" class="form-control" id="" aria-describedby="TipoPrenda" name="tipoMaterial" value="{{ old('tipoMaterial') ?? $material->tipoMaterial}}">
                                    @error('tipoMaterial')
                                    <h4>{{ $message }}</h4>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="cantidadMaterial" class="form-label">Cantidad de materail</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="ColorPrenda" name="cantidadMaterial" value="{{ old('cantidadMaterial') ?? $material->cantidadMaterial }}">
                                    @error('cantidadMaterial')
                                    <h4>{{ $message }}</h4>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="costo" class="form-label">Costo por unidad</label>
                                    <input type="number" class="form-control" id="" aria-describedby="TallaPrenda" name="costo" value="{{ old('costo') ?? $material->costo }}">
                                    @error('costo')
                                    <h4>{{ $message }}</h4>
                                    @enderror
                                </div>
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