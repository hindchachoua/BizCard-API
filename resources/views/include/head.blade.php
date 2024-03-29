<nav class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
        <h1 class="text-primary m-0">{{ config('app.name') }}</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto p-4 p-lg-0">
            <a href="" class="nav-item nav-link active">Home</a>
            <a href="" class="nav-item nav-link">About</a>
            <a href="" class="nav-item nav-link">Products</a>
            
            
        </div>
        <div class="d-none d-lg-flex">
            {{-- @auth --}}
                {{-- <span class="navbar-text me-3">{{ auth()->user()->name }}</span> --}}
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </li>
            {{-- @else --}}
                <li class="nav-item">
                    <button type="button" class="btn btn-primary me-3 d-lg-block"><a style="color: white" href="{{ route('login') }}">Login</a></button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            {{-- @endauth --}}
        </div>
    </div>
</nav>
