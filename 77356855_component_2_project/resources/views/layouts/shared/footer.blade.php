<div class="row g-0 mt-5">
    <div class="col-12 g-0 ps-2 pe-4 m-0 border-top-black" style="background: #c1c1c1; height: auto; padding: 40px 0;">
        <footer class="d-flex flex-column flex-lg-row justify-content-between align-items-center h-100 px-4">
            <div class="d-flex align-items-center col-lg-6 col-12 mb-4 mb-lg-0">
                <a class="footer-logo" href="{{ url('/') }}">
                    <img style="max-height: 120px; max-width: 120px;" src="/img/logo.png" title="Tasty Bites">
                </a>
                <span class="text-peach fs-4 ms-3" style="font-family: 'Trebuchet MS', sans-serif; margin-top: 20px;">{{ config('Tasty Bites') }}</span>
            </div>
            <div class="footer-links d-flex align-items-center col-lg-6 col-12 justify-content-center justify-content-lg-end">
                <a class="me-4 text-white text-decoration-none fs-5" href="{{ url('/about-us') }}">About Us</a>
                <a class="me-4 text-white text-decoration-none fs-5" href="{{ url('/recipes') }}">Recipes</a>
                <a class="me-4 text-white text-decoration-none fs-5" href="{{ url('/contact') }}">Contact</a>
                <a class="me-4 text-white text-decoration-none fs-5" href="{{ url('/privacy-policy') }}">Privacy Policy</a>
            </div>
        </footer>
    </div>
</div>