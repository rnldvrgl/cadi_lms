<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts2 for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css' )}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/register.css')}}">
        <link href="{{ asset('css/sb-admin-2.min.css' )}}" rel="stylesheet">
        <link rel="shortcut icon" href="https://tse2.mm.bing.net/th/id/OIP.ILFBlroXVxtyeoxjsUMCQAAAAA?rs=1&pid=ImgDetMain">
        <link rel="shortcut icon" href="{https://tse2.mm.bing.net/th/id/OIP.ILFBlroXVxtyeoxjsUMCQAAAAA?rs=1&pid=ImgDetMain" type="image/x-icon">

</head>

<body>
    <center>
                            
                            <form class="user" method="POST" action="register_now">
                            @include('components.modals.SuccessModal')
                            <div class="text-center">
                            <img class="logo-icon" src="{{ URL('img/logo.png')}}" alt="logo"><br>
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                                @if($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </div>
                                @endif

                                @csrf
                                <div class="form-group">
                                        <input value="{{old('name')}}" type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Full name"  name="name" @error('name')style="border: 3px solid #F19E9EFF;"  @enderror>
                                </div>
                                <div class="form-group">
                                    <input value="{{old('email')}}" type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email" @error('email')style="border: 3px solid #F19E9EFF;" @enderror>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input value="{{old('password')}}" type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password" @error('password')style="border: 3px solid #F19E9EFF;" @enderror>
                                    </div>
                                    <div class="col-sm-6">
                                        <input value="{{old('password_confirmation')}}" type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation" @error('password_confirmation')style="border: 3px solid #F19E9EFF;" @enderror>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Sign up">
                                </a>
                                <hr>
                                <div class="text-center">
                                <a class="small" href="forgot-password">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login">Already have an account? Login!</a>
                            </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </center>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js' )}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js' )}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js' )}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js' )}}"></script>

</body>

</html>
