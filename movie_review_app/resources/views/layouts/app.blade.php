<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Review App</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
    <body class="bg-light">
        <div class="container-fluid shadow-lg header">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <h1 class="text-center"><a href="http://localhost:8000" class="h3 text-white text-decoration-none">Movie Review App</a></h1>
                    <div class="d-flex align-items-center navigation">
                        @if (Auth::check())
                        <a href="{{route('account.profile')}}" class="text-white">My Account</a>
                            @else
                            <a href="{{route('account.login')}}" class="text-white">Login</a>
                            <a href="{{route('account.register')}}" class="text-white ps-2">Register</a>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        @yield('main')
        @yield('script')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    </body>
</html>


