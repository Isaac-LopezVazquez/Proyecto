<div>

<!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
  <body>
	
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Prendas <b>registradas</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Registrar prenda</span></a>
									
					</div>
                </div>
            </div>
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
                </tbody>
	<div id="editEmployeeModal{{$p->id}}" class="modal fade"> <!-- Edit Modal HTML -->
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{ route('prenda.update', $p->id) }}" method='POST'> <!-- FORMULARIO EDITAR -->
					<div class="modal-header">						
						<h4 class="modal-title">Editar prenda</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
						
							
						</div>
						<div class="form-group">
						@csrf
						@method('patch')
							<label>Tipo</label>
							<input type="text" class="form-control"   name='tipo' id='tipo'  value="{{old('tipo') ?? $p->tipo}}" required>
							@error('tipo')
       							 <h4>{{ $message}}</h4>
    						@enderror
						</div>
						<div class="form-group">
							<label>Color</label>
							<input type="text" class="form-control"   name='color' id='color'  value="{{old('color') ?? $p->color}}" required>
							@error('color')
       							 <h4>{{ $message}}</h4>
    						@enderror
						</div>
						<div class="form-group">
							<label>Talla</label>
							<input type="number" class="form-control"   name='talla' id='talla'  value="{{old('talla') ?? $p->talla}}" required>
							@error('talla')
       							 <h4>{{ $message}}</h4>
    						@enderror
						</div>
						<div class="form-group">
							<label>Costo</label>
							<input type="number" class="form-control"  name='costo' id='costo' value="{{old('costo') ?? $p->costo}}" required>
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
	<div id="deleteEmployeeModal{{$p->id}}" class="modal fade"> <!-- delete Modal HTML -->
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('prenda.destroy', $p)}}" method="POST">
					@csrf
					@method('DELETE')
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar prenda</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Esta seguro de eliminar esta prenda?{{$p}}</p>
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
            </table>
			
        </div>
    </div>
	<!-- add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{ route('prenda.store') }}" method='POST'>  <!-- FORMULARIO -->
					<div class="modal-header">						
						<h4 class="modal-title">Registro de prenda</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
						@csrf
							<label>Tipo</label>
							<input type="text" class="form-control"  name='tipo' id='tipo' value="{{old('tipo')}}" required>
							@error('tipo')
       							 <h4>{{ $message}}</h4>
    						@enderror
						</div>
						<div class="form-group">
							<label>Color</label>
							<input type="text" class="form-control"   name='color' id='color'  value="{{old('color')}}" required>
							@error('color')
       							 <h4>{{ $message}}</h4>
    						@enderror
						</div>
						<div class="form-group">
							<label>Talla</label>
							<input type="number" class="form-control"   name='talla' id='talla'  value="{{old('talla')}}" required>
							@error('talla')
       							 <h4>{{ $message}}</h4>
    						@enderror
						</div>
						<div class="form-group">
							<label>Costo</label>
							<input type="number" class="form-control"  name='costo' id='costo'  value="{{old('costo')}}" required>
							@error('costo')
       							 <h4>{{ $message}}</h4>
    						@enderror
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	
	<!-- Delete Modal HTML -->
	
	
</body>
</html>
</div>