<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>@yield('title', 'Online Store')</title>
    </head>
<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">Online Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                <a class="nav-link active" href="{{ route('product.index') }}">Products</a>
                <a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>
                <a class="nav-link active" href="{{ route('home.about') }}">About</a>
                <div class="vr-bg-white mx-2 d-none d-lg-block"></div>
                @guest
                    <a class="nav-link active" href="{{ route('login') }}">Login</a>
                    <a class="nav-link active" href="{{ route('register') }}">Register</a>
                @else
                    <form id="logout" action="{{route('logout')}}" method="POST">
                        @csrf
                        <a class="nav-link active" role="button" href="#" onclick="document.getElementById('logout').submit()">Logout</a>
                    </form>
                @endguest
                </div>
            </div>
        </div>
    </nav>
    <header class="masthead bg-primary text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', 'A Laravel Online Store')</h2>
        </div>
    </header>
    <!-- header -->

    <main>
        <div class="container my-4">
            @yield('content')
        </div>
    </main>



    <!-- footer -->
    <footer class="copyright text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-center text-md-start">Online Store &copy; 2021</p>
                </div>
                <div class="col-md-6">
                    <p class="text-center text-md-end">All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>
</html>
