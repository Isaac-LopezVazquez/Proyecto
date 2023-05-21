<div>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!--  Poner la navegacion -->
                <div class="container-fluid">
                    <a class="navbar-brand" href="/inicio"><img src="{{ asset('/img_plantilla/logos/BlackBox.jpeg') }}" alt="" width="50px"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/dashboard">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('prenda.index') }}">Prendas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('material.index') }}">Materiales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('provedor.index') }}">Proveedores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('empleado.index') }}">Empleados</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('archivo.index') }}">Archivo</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('/img_plantilla/logos/menu.png') }}" alt="" width="50px">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                <div class="message-body">
                                    
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <a class="btn btn-outline-primary mx-3 mt-2 d-block" aria-current="page" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Cerrar Sesion') }}
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>
</div>

</div>