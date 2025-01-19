<div class="row g-0">
    <div class="col-12 g-0 p-2 ps-1 pe-1 m-0">
        <nav class="navbar navbar-light mt-2 mb-2 p-0">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img style="max-height: 70px; max-width: 70px;" src="/img/logo.png" title="Tasty Bites">
                </a>

                <div class="d-flex align-items-center">
                    <!-- Check if the user is a guest or authenticated -->
                    @guest
                    <a class="me-3 text-black" href="{{ route('login') }}" style="text-decoration: none; font-weight: bold;">Login</a>
                    <a class="text-black" href="/register" style="text-decoration: none; font-weight: bold;">Register</a>
                    @endguest
                    {{-- @auth
                        <!-- Display user name and dashboard link if authenticated -->
                        <span class="me-3" style="font-weight: bold;">Hi, {{ Auth::user()->name }}</span>
                        <a href="/dashboard" style="text-decoration: none;"><b>Dashboard</b></a>

                        <!-- Logout Form -->
                        <form action="{{ route('logout') }}" method="POST" class="d-inline ms-2">
                            @csrf
                            <button class="btn btn-link p-0" style="font-weight: bold;">Logout</button>
                        </form>
                    @endauth --}}
                </div>
            </div>
        </nav>

        <!-- Blog Image Section -->
        <div class="col-12 text-center g-0 border-bottom-black border-top-black">
            <img style="width: 100%; height: 430px; object-fit: cover;" src="/img/receipe.jpg" title="Blog Main Image">
        </div>
    </div>
</div>
