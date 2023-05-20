<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Archivos</title>
    <link rel="stylesheet" href="{{ asset('/css_plantilla/styles.min.css') }}">
</head>

<body>
    <x-layout />
    <div class="container">
        <div class="row">
            <div class="col-lg d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Archivos</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-info">
                                        <th>Nombre original</th>
                                        <th>Ruta</th>
                                        <th>MIME</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($archivos as $archivo)
                                    <tr>
                                        <td>{{$archivo->nombre}}</td>
                                        <td>{{$archivo->hash}}</td>
                                        <td>{{$archivo->mime}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-primary btn-sm mr-2 text-dark" href="{{route('archivo.descargar',$archivo)}}">Descargar</a>
                                                <form action="{{ route('archivo.destroy', $archivo) }}" method="POST" class="formulario-eliminar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="mostrarConfirmacion(this)" class="btn btn-primary btn-sm text-dark">Eliminar</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('archivo.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="archivo">Selecciona archivo</label>
                    <input type="file" name="archivo" id="archivo">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary text-dark">Subir archivo</button>
                </div>
            </div>
        </div>
    </form>

    @section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if(session('archivo') == 'eliminado')
    <script>
        Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
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
    </body>
    <script src="{{ asset('/js_plantilla/sidebarmenu.js') }}"></script>
    <script src="{{ asset('/js_plantilla/app.min.js') }}"></script>
    <script src="{{ asset('/js_plantilla/dashboard.js') }}"></script>
    <script src="{{ asset('/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/libs/simplebar/dist/simplebar.js') }}"></script>
</html>