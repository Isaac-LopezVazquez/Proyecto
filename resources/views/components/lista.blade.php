<div>

    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
        <link rel="stylesheet" href="{{ asset('style.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                <!-- add Modal HTML -->
                <div id="addEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('prenda.store') }}" method='POST'> <!-- FORMULARIO -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Registro de prenda</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        @csrf
                                        <label>Tipo</label>
                                        <input type="text" class="form-control" name='tipo' id='tipo' value="{{old('tipo')}}" required>
                                        @error('tipo')
                                        <h4>{{ $message}}</h4>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Color</label>
                                        <input type="text" class="form-control" name='color' id='color' value="{{old('color')}}" required>
                                        @error('color')
                                        <h4>{{ $message}}</h4>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Talla</label>
                                        <input type="number" class="form-control" name='talla' id='talla' value="{{old('talla')}}" required>
                                        @error('talla')
                                        <h4>{{ $message}}</h4>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Costo</label>
                                        <input type="number" class="form-control" name='costo' id='costo' value="{{old('costo')}}" required>
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
                {{$slot}}
            </div>
        </div>
    </body>
    <script src="{{ asset('script.js') }}"></script>

    </html>