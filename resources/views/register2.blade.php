<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>RegistrationForm_v10 by Colorlib</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{asset('fonts2/linearicons/style.css2')}}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset('css2/log_style.css2')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</head>

<body>

<div class="wrapper">
    <div class="inner">
        <img src="{{asset('images2/image-1.png')}}" alt="" class="image-1">
        <form method="POST" action="register_now">
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </div>
            @endif

            @csrf
            <h3>New Account?</h3>
            <div class="form-holder">
                <span class="lnr lnr-user"></span>
                <input type="text" class="form-control" name="name" placeholder="Name" @error('name')style="border: 3px solid #F19E9EFF;" @enderror>
            </div>
{{--            <div class="form-holder">--}}
{{--                <span class="lnr lnr-phone-handset"></span>--}}
{{--                <input type="text" class="form-control" placeholder="Phone Number">--}}
{{--            </div>--}}
            <div class="form-holder">
                <span class="lnr lnr-envelope"></span>
                <input type="text" class="form-control" name="email" placeholder="Email" @error('email')style="border: 3px solid #F19E9EFF;" @enderror>
            </div>
            <div class="form-holder">
                <span class="lnr lnr-lock"></span>
                <input type="password" class="form-control" name="password" placeholder="Password" @error('password')style="border: 3px solid #F19E9EFF;" @enderror>
            </div>
            <div class="form-holder">
                <span class="lnr lnr-lock"></span>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" @error('password_confirmation')style="border: 3px solid #F19E9EFF;" @enderror>
            </div>
            <button>
                <span>Register</span>
            </button>
            <a href="../login" class="btn">Already have an account? Login</a>
        </form>
        <img src="{{asset('images2/image-2.png')}}" alt="" class="image-2">
    </div>

</div>

<script src="{{asset('js2/jquery-3.3.1.min.js2')}}"></script>
<script src="{{asset('js2/main.js2')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
