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
                            <h5 class="card-title fw-semibold">Detalles del Empleado</h5>
                        </div>
                        <ul class="timeline-widget mb-0 position-relative mb-n5">

                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-desc fs-3 text-dark mt-n1">Nombre del empleado:</div>
                                <div class="timeline-desc fs-3 text-dark mt-n1">{{$empleado->nombre}} {{$empleado->apellidoP}} {{$empleado->apellidoM}}</div>
                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-desc fs-3 text-dark mt-n1">Telefono:</div>
                                <div class="timeline-desc fs-3 text-dark mt-n1">{{$empleado->telefono}}</div>
                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-desc fs-3 text-dark mt-n1">RFC:</div>
                                <div class="timeline-desc fs-3 text-dark mt-n1">{{$empleado->rfc}}</div>
                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-desc fs-3 text-dark mt-n1">Salario:</div>
                                <div class="timeline-desc fs-3 text-dark mt-n1">{{$empleado->salario}}</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <table class="table text-nowrap mb-0 align-middle">
            <div class="timeline-desc fs-3 text-dark mt-n1">
            <div class="mb-4">
                            <h5 class="card-title fw-semibold">Historial de prendas hechas</h5>
                        </div>
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tipo de prenda</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Color de prenda</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Talla</h6>
                        </th>
                    </tr>
                </thead>
            </div>
            @foreach( $prendas as $p)
            <tbody>
                <tr>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">{{ $p->tipo }}</h6>
                    </td>
                    <td class="border-bottom-0">

                        <h6 class="fw-semibold mb-0">{{ $p->color }}</h6>
                    </td>
                    <td class="border-bottom-0">

                        <h6 class="fw-semibold mb-0">{{ $p->talla }}</h6>
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