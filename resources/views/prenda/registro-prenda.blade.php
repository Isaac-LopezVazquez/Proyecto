<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css_plantilla/styles.min.css') }}">
    <title>Agregar Prenda</title>
</head>

<body>
    <x-layout />
    <div class="row">
        <div class="card">
            <h5>Agregar Prenda</h5>
            <div class="card-body">
                <form action="{{ route('prenda.store') }}" method="POST">
                    @csrf
                    <div class="row justify-content-evenly">
                        <div class="col-4">
                            <label for="tipo" class="form-label">Tipo Prenda</label>
                            <input type="text" class="form-control" id="" aria-describedby="TipoPrenda" name="tipo" value="{{ old('tipo') }}">
                            @error('tipo')
                            <h4>{{ $message }}</h4>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="color" class="form-label">Color de la prenda</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="ColorPrenda" name="color" value="{{ old('color') }}">
                            @error('color')
                            <h4>{{ $message }}</h4>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-evenly">
                        <div class="col-4">
                            <label for="talla" class="form-label">Talla de la prenda</label>
                            <input type="number" class="form-control" id="" aria-describedby="TallaPrenda" name="talla" value="{{ old('talla') }}">
                            @error('talla')
                            <h4>{{ $message }}</h4>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="costo" class="form-label">Costo de la prenda</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="CostoPrenda" name="costo" value="{{ old('costo') }}">
                            @error('talla')
                            <h4>{{ $message }}</h4>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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