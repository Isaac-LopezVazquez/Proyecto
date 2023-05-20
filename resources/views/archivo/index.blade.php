<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="mr-md-3 mr-xl-3">
                    <div class="display-4">Archivos</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-info">
                            <th>nombre original</th>
                            <th>ruta</th>
                            <th>mime</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($archivos as $archivo)
                        <tr>
                            <td>
                                {{$archivo->nombre}}
                            </td>
                            <td>
                                {{$archivo->hash}}
                            </td>
                            <td>
                                {{$archivo->mime}}
                            </td>
                            <td>
                                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{route('archivo.descargar',$archivo)}}">Descargar</a>
                            </td>
                            <td>
                                <form action="{{ route('archivo.destroy', $archivo) }}" method="POST" class="formulario-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="mostrarConfirmacion(this)" class="bg-danger hover:bg-danger text-white font-bold py-2 px-4 rounded">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form action="{{route('archivo.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Selecciona archivo</label>
        <input type="file" name="archivo" id="archivo">
    </div>
    <div class="col-md-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Button
        </button>
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