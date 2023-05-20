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
        <div class="row">
            <div class="col-lg d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Empleados</h5>
                        <a href="{{ route('empleado.create') }}">Agregar</a>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Nombre</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Telefono</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Acciones</h6>
                                        </th>
                                    </tr>
                                </thead>
                                @foreach( $empleado as $e)
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">{{ $e->nombre }} {{ $e->apellidoP }} {{ $e->apellidoM }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">{{ $e->telefono }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 fs-4">
                                                <a href="#editEmployeeModal{{$e->id}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                <form action="{{ route('empleado.destroy', $e) }}" method="POST" class='formulario-eliminar'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="mostrarConfirmacion(this)">Eliminar</button>
                                                </form>
                                                <a href="{{ route('empleado.edit', $e) }}">VER</a>
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

    @if(session('empleado') == 'eliminado' || session('success')) 
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('empleado') == 'eliminado' ? 'El empleado ha sido eliminado.' : session('success') }}',
            timer: 3000 // Duración de la notificación en milisegundos (3 segundos en este caso)
        });
    </script>
    @endif          

    <script>
        function mostrarConfirmacion(button) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = button.parentNode;
                    form.submit();
                }
            });
        }
    </script>

    <script src="{{ asset('/js_plantilla/sidebarmenu.js') }}"></script>
    <script src="{{ asset('/js_plantilla/app.min.js') }}"></script>
    <script src="{{ asset('/js_plantilla/dashboard.js') }}"></script>
    <script src="{{ asset('/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/libs/simplebar/dist/simplebar.js') }}"></script>

</body>

</html>
