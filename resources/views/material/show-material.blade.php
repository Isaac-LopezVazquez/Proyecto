<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empleado</title>
    <link rel="stylesheet" href="{{ asset('/css_plantilla/styles.min.css') }}">
</head>

<body>
    <x-layout />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 d-flex align-items-center">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <h5 class="card-title fw-semibold">Agregar la prenda que se hizo con este material: {{$material->tipoMaterial}}</h5>
                        </div>
                    </div>
                    <form action="{{ route('material.agrega-prenda', $material) }}" method="POST">
                        @csrf
                        <div class="row justify-content-evenly">
                            <div class="col-4">
                                <div class="col">
                                    <select name="prenda_id" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona la prenda</option>
                                        @foreach ($prendas as $p)
                                        <option value="{{$p->id}}">{{$p->id}} - {{$p->tipo}} - {{$p->color}} - {{$p->talla}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn">Enviar</button>
                    </form>
                </div>
            </div>
        </div>

        <table class="table text-nowrap mb-0 align-middle">
            <div class="timeline-desc fs-3 text-dark mt-n1">
                <div class="mb-4">
                    <h5 class="card-title fw-semibold">Prendas:</h5>
                </div>
                <thead class="text-dark fs-4">
                    <tr>
                    <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">ID</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tipo de prenda</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Color</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Talla</h6>
                        </th>
                    </tr>
                </thead>
            </div>
            @foreach( $material->prendas as $pren)
            <tbody>
                <tr>
                <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">{{ $pren->id }}</h6>
                    </td>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">{{ $pren->tipo }}</h6>
                    </td>
                    <td class="border-bottom-0">

                        <h6 class="fw-semibold mb-0">{{ $pren->color }}</h6>
                    </td>
                    <td class="border-bottom-0">

                        <h6 class="fw-semibold mb-0">{{ $pren->talla }}</h6>
                    </td>
                </tr>

            </tbody>
            @endforeach
        </table>
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