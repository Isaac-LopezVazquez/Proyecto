<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto 2</title>
</head>

<body>

    <x-Layout />

    <x-Lista :prenda="$prenda">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Color</th>
                    <th>Talla</th>
                    <th>Costo</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            @foreach( $prenda as $p)
            <tbody>
                <tr>
                    <td>{{ $p->tipo }}</td>
                    <td>{{ $p->color }}</td>
                    <td>{{ $p->talla }}</td>
                    <td>{{ $p->costo }}</td>
                    <td>
                        <a href="#editEmployeeModal{{$p->id}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal{{$p->id}}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>


                </div>
                </div>
                <!-- Edit Modal HTML -->
                <div id="editEmployeeModal{{$p->id}}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('prenda.update', $p->id) }}" method='POST'> <!-- FORMULARIO EDITAR -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar prenda</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        @csrf
                                        @method('patch')

                                    </div>
                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <input type="text" class="form-control" name='tipo' id='tipo' value="{{old('tipo') ?? $p->tipo}}" required>
                                        @error('tipo')
                                        <h4>{{ $message}}</h4>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Color</label>
                                        <input type="text" class="form-control" name='color' id='color' value="{{old('color') ?? $p->color}}" required>
                                        @error('color')
                                        <h4>{{ $message}}</h4>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Talla</label>
                                        <input type="number" class="form-control" name='talla' id='talla' value="{{old('talla') ?? $p->talla}}" required>
                                        @error('talla')
                                        <h4>{{ $message}}</h4>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Costo</label>
                                        <input type="number" class="form-control" name='costo' id='costo' value="{{old('costo') ?? $p->costo}}" required>
                                        @error('costo')
                                        <h4>{{ $message}}</h4>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-info" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Delete Modal HTML -->
                <div id="deleteEmployeeModal{{$p->id}}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('prenda.destroy', $p->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h4 class="modal-title">Eliminar prenda</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Esta seguro de eliminar esta prenda? {{$p->tipo}} - {{$p->color}}</p>
                                    <p class="text-warning"><small>Esta accion no se puede deshacer.</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </x-lista>