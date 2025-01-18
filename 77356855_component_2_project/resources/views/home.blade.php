<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.shared.header')

</head>
<body style="background-color: #F8F9F9">

   @include('layouts.shared.navbar') 
   
   <div class="container ps-5 pe-5">
    <div class="row">
        <div class="col-12 p-2 text-center mt-4 mb-4 border-bottom-black">
        <h1 style='font-family: "Dancing Script", cursive;'>Tasty Bites</h1>
        <p style='font-family: "Lora", serif;'>Delicious recipes, made easy – Tasty Bites brings the flavors you love to your kitchen!</p>
        </div>
        
    </div>
    <div class="row">
      @include('home.blog')
        <div class="col-lg-1 col-0" >

        </div>
        <div class="col-lg-3 col-12 mt-5 ps-lg-4" >
            <div class="row">
                @include('home.trending')
                @include('home.recent')
                @include('home.tags')

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 g-0 mt-2">
            <nav>
                <ul class="pagination justify-content-center">
                   <li class="page-item @if($page_number === 1) disabled @endif">
                       <a class="page-link" href="/?page={{ $page_number - 1}}" >
                        Previous
                        </a>
                   </li>
                   @for ($i = 0; $i < ceil($total_blogs / $page_length); $i++)
                        <li class="page-item @if($page_number === $i + 1) active @endif">
                            <a class="page-link" href="/?page={{ $i + 1}}" >{{ $i + 1}}</a>
                        </li>
                   @endfor
                   <li class="page-item @if($page_number >= ceil($total_blogs / $page_length) ) disabled @endif">
                      <a class="page-link" href="/?page={{ $page_number + 1}}" >
                       Next
                       </a>
                   </li>
                </ul>
            </nav>

        </div>
    </div>
</div>
@include('layouts.shared.footer')
   <script src ="{{ asset ('js/app.js')}}"></script>
</body>
</html>
