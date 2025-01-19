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
        <h1 class="text-dark text-center">Welcome Back!</h1>
        </div>  
        <div class="col-sm-12 col-md-8 col-lg-5">
            <form name="login" class="mt-2">
               @csrf
               <div class="row mt-2">
                <div class="col-12">
                    <div id="formErrors" class="alert alert-danger text-start" role="alert" style="display:none;">
                        <ul class="m-0">    
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="email" class="text-start">Email</label>
                        <input id="email" type="email" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="password" class="text-start">Password</label>
                        <input id="password" type="password" class="form-control">
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <button id="signInBtn" type="button" class="btn btn-dark font-weight-bolder w-100">
                        Sign In
                    </button>

                </div>
            </div>
            </form>
        </div>
    </div>  
    </div>
    
    
</div>
@include('layouts.shared.footer')
   <script src ="{{ asset ('js/app.js')}}"></script>
   <script>
        let loginSubmitted = false;

        function clearErrors() {
            $("#formErrors ul").empty();
            $("#formErrors").hide();
        }

        function addErrors(errorArray) {
        if (Array.isArray(errorArray) && errorArray.length > 0) {
            for (let i = 0; i < errorArray.length; i++) {
            $("#formErrors ul").append("<li>" + errorArray[i] + "</li>");
            }

            $("#formErrors").show();
        }
        }

        function formatErrors(errorArray) {
        let errorsList = [];

        for (var key in errorArray) {
            if (errorArray.hasOwnProperty(key)) {
            errorsList.push(errorArray[key]);
            }
        }

        return errorsList;
        }

        $(document).ready(function() {
        $("#signInBtn").click(function(e) {
            e.preventDefault();
            clearErrors();

            if (loginSubmitted !== true) {
            loginSubmitted = true;

            $.post({
                url: "{{ route('login.post') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    email: $("#email").val(),
                    password: $("#password").val()
                },
                success: function (response) {
                    loginSubmitted = false;
                    window.location.href = response.redirect;
                },
                error: function(response) {
                loginSubmitted = false;

                if (response.status == 422) {
                    addErrors(formatErrors(response.responseJSON.errors));
                } else {
                    addErrors(["Unable to process your request."]);
                }
                }
            });
            }
        });
    });
  </script>
    
</body>
</html>
