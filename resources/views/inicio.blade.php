<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/css_plantilla/styles.min.css') }}">

    <title>Inicio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="antialiased">
    <x-layout />

    <div class="container" style="margin-top: 100px;">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card border-dark h-100 ">
                    <div class="card-body">
                        <h5 class="card-title">Prendas</h5>
                        <p class="card-text"><a href="{{ route('prenda.index') }}">Click aqui para ir</a></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-dark h-100 ">
                    <div class="card-body">
                        <h5 class="card-title">Materiales</h5>
                        <p class="card-text"><a href="{{ route('material.index') }}">Click aqui para ir</a></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-dark h-100 ">
                    <div class="card-body">
                        <h5 class="card-title">Proveedores</h5>
                        <p class="card-text"><a href="{{ route('provedor.index') }}">Click aqui para ir</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top: 50px;">
            <div class="col">
                <div class="card border-dark h-100 ">
                    <div class="card-body">
                        <h5 class="card-title">Empleados</h5>
                        <p class="card-text"><a href="{{ route('empleado.index') }}">Click aqui para ir</a></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div >
                    <div >
                        <h5 ></h5>
                        <p ></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-dark h-100 ">
                    <div class="card-body">
                        <h5 class="card-title">Archivo</h5>
                        <p class="card-text"><a href="{{ route('archivo.index') }}">Click aqui para ir</a></p>
                    </div>
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