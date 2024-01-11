<!DOCTYPE html>
<html lang="en">

<head>
    <title>LMS Login</title>
    @include('components/header')
    @include('components.modals.SuccessModal')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="{{ URL::to('logo1.svg') }}">
    <link rel="shortcut icon" href="{{ URL::to('logo1.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
</head>
<body>
<center>

                                    <form class="user" method="POST" action="adminLogin">
                                    <img class="logo-icon" src="{{ URL('img/logo.png')}}" alt="logo"><br>
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        @if($errors->any())
                                            <div class="alert alert-danger" role="alert">
                                                @foreach($errors->all() as $err)
                                                    <li>{{ $err }}</li>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if(isset($error))
                                            <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                        @endif

                                        @csrf
                                        <div class="form-group">
                                            <input value="{{old('email')?old('email'):$old['email']}}" type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." @error('email')style="border: 3px solid #F19E9EFF;" @enderror>
                                        </div>
                                        <div class="form-group">
                                            <input value="{{old('password')?old('password'):$old['password']}}" type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" @error('password')style="border: 3px solid #F19E9EFF;" @enderror>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-checkbox small">
                                                <input type="checkbox" class="" id="ShowPassword">
                                                <label class="show-button" for="customCheck">Show password</label>
                                            </div>
                                        </div>
                                        <input type="submit"  value="Login" class="btn btn-primary btn-user btn-block">

                                        <hr>
{{--                                        <a href="main_dashboard" class="btn btn-google btn-user btn-block">--}}
{{--                                            <i class="fab fa-google fa-fw"></i> Login with Google--}}
{{--                                        </a>--}}
{{--                                        <a href="main_dashboard" class="btn btn-facebook btn-user btn-block">--}}
{{--                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook--}}
{{--                                        </a>--}}
                                            <div class="text-center">
                                                <a class="small" href="forgot-password">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </form></center>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</body>

</html>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script>

    var checkbox = document.getElementById('ShowPassword');
    checkbox.addEventListener('change', function() {
        console.log('joke');
        var passwordField = document.getElementById("exampleInputPassword");
        if (passwordField.type == "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    });
</script>
