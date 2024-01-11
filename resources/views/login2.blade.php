<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
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

        <form method="POST" action="studLogin">

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
            <h3>Login</h3>
{{--            @error('email')<div class="alert alert-danger" role="alert">{{ $message }}</div>@enderror--}}
            <div class="form-holder">
                <span class="lnr lnr-envelope"></span>
                <input type="text" class="form-control" name="email" placeholder="Email" @error('email')style="border: 3px solid #F19E9EFF;" @enderror>

            </div>
{{--            @error('password')<div class="alert alert-danger" role="alert">{{ $message }}</div>@enderror--}}
            <div class="form-holder">
                <span class="lnr lnr-lock"></span>
                <input type="password" class="form-control" name="password" placeholder="Password" @error('password')style="border: 3px solid #F19E9EFF" @enderror>
            </div>
            <button>
                <span>Login</span>
            </button>
            <a href="../register" class="btn">no account yet? Register</a>
        </form>
        <img src="{{asset('images2/image-2.png')}}" alt="" class="image-2">
    </div>

</div>

<script src="{{asset('js2/jquery-3.3.1.min.js2')}}"></script>
<script src="{{asset('js2/main.js2')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
