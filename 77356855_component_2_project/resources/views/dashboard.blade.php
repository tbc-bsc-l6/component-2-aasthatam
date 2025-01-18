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
        <h1 style='font-family: "Dancing Script", cursive;'>Dashboard</h1>
        <p style='font-family: "Lora", serif;'>Delicious recipes, made easy – Tasty Bites brings the flavors you love to your kitchen!</p>
        </div>    
    </div>  
    
</div>
@include('layouts.shared.footer')
   <script src ="{{ asset ('js/app.js')}}"></script>
</body>
</html>

