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
        <h1 style='font-family: "Trebuchet MS", sans-serif;'>Tasty Bites</h1>
        <p style='font-family: "Trebuchet MS", sans-serif;'>Delicious recipes, made easy – Tasty Bites brings the flavors you love to your kitchen!</p>
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
</div>
  
   <script src ="{{ asset ('js/app.js')}}"></script>
</body>
</html>
