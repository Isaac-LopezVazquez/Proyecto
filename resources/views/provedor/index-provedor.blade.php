<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Provedores</title>
    <link rel="stylesheet" href="{{ asset('/css_plantilla/styles.min.css') }}">
</head>

<body>
    <x-layout />
    <div class="container">
        <div class="row">
            <div class="col-lg d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Provedores</h5>
                        <a href="{{ route('provedor.create') }}">Agregar</a>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Nombre del Provedor</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Telefono</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Acciones</h6>
                                        </th>
                                    </tr>
                                </thead>
                                @foreach( $provedor as $p)
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0">

                                            <h6 class="fw-semibold mb-0">{{ $p->nombreP }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">{{ $p->telefono }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 fs-4">
                                                <a href="{{ route('provedor.show', $p) }}">Ver</a>
                                            </h6>
                                            <h6 class="fw-semibold mb-0 fs-4"><a href="{{ route('provedor.edit', $p) }}">Editar</a></h6>
                                            <h6 class="fw-semibold mb-0 fs-4">
                                                <form action="{{ route('provedor.destroy', $p) }}" method="POST" onsubmit="mostrarConfirmacion(event)">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"> Eliminar</button>
                                                </form>
                                            </h6>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('/js_plantilla/sidebarmenu.js') }}"></script>
    <script src="{{ asset('/js_plantilla/app.min.js') }}"></script>
    <script src="{{ asset('/js_plantilla/dashboard.js') }}"></script>
    <script src="{{ asset('/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/libs/simplebar/dist/simplebar.js') }}"></script>
    <script>
        function mostrarConfirmacion(event) {
            event.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = event.target;
                    form.submit();
                }
            });
        }

        @if(session('prenda') == 'eliminado' || session('success'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('prenda') == 'eliminado' ? 'El proveedor ha sido eliminado.' : session('success') }}',
            timer: 3000 // Duración de la notificación en milisegundos (3 segundos en este caso)
        });
        @endif
    </script>
</body>

</html>
