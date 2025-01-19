<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.shared.header')
</head>
<body style="background-color: #F8F9F9">

    @include('layouts.shared.navbar')

    <div class="container">
        <div class="row justify-content-center p-3">
            <div class="col-12">
                <h1 class="text-dark text-center">Create Your Account</h1>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-5">
                <form name="register" class="mt-2" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <!-- Name Field -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="name" class="text-start">Name</label>
                                <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="email" class="text-start">Email</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="password" class="text-start">Password</label>
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="password_confirmation" class="text-start">Confirm Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-dark font-weight-bolder w-100">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.shared.footer')

</body>
</html>
