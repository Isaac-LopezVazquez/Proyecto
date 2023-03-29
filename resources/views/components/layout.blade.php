<div>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <nav class="navbar navbar-expand-lg" style="background-color: #edeced;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">BlackBox</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Inicio</a>
                    </li>
                    <li class="nav-item position-absolute top-0 end-0">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <a class="nav-link active" aria-current="page" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
</div>