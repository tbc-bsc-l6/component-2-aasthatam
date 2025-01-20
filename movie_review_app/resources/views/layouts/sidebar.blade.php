<ul class="nav flex-column">

    @if(Auth::user()->role == 'admin')
        <li class="nav-item">
            <a href="{{route('movies.index')}}">Movies</a>                               
        </li>
        <li class="nav-item">
            <a href="reviews.html">Reviews</a>                               
        </li>
    @endif 
                        <li class="nav-item">
                            <a href="profile.html">Profile</a>                               
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost:8000">My Movies</a>
                        </li>
                        <li class="nav-item">
                            <a href="change-password.html">Change Password</a>
                        </li> 
                        <li class="nav-item">
                            <a href="{{ route('account.logout') }}">Logout</a>
                        </li>                           
</ul>