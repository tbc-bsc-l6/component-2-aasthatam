<div class="row g-0">
    <div class="col-12 g-0 p-2 ps-1 pe-1 m-0">
        <nav class="navbar navbar-expand-lg navbar-light mt-2 mb-2 p-0">
            <div class="container-fluid ">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img style="max-height: 70px; max-width: 70px;" src="/img/logo.png" title="Tasty Bites">
                </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard/blogs') }}">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Images</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard/users') }}">Users</a>
                        </li>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" airia-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-center text-dark" onclick="event.preventDefault()" id="logoutButton">Logout</a></li>
                            </ul>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>

            </div>
        </nav>
        <div class="col-12 text-center g-0 border-bottom-black border-top-black">
            <img style="width: 100%; height: 430px; object-fit: cover;" src="/img/receipe.jpg" title="Blog Main Image">
         </div>
    </div>
   </div>