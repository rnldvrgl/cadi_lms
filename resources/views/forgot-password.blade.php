<!DOCTYPE html>
<html lang="en">

<head>
    @include('components/header')
    <title>Forgot Password</title>

    <link rel="stylesheet" href="{{ asset('css/forgot-password.css')}}">
</head>
<center>

                                    <form class="user" method="post" action="send-otp">
                                        <img class="logo-icon" src="{{ URL('img/logo.png')}}" alt="logo"><br>
                                    <h1 class="h4 text-gray-900 mb-4">Forgot Password</span></h1>
                                        @if($errors->any())
                                            <div class="alert alert-danger" role="alert">
                                                @foreach($errors->all() as $err)
                                                    <li>{{ $err }}</li>
                                                @endforeach
                                            </div>
                                        @endif


                                        @csrf
                                        <div class="form-group">
                                            <input value="{{old('email')}}" type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" @error('email')style="border: 3px solid #F19E9EFF;" @enderror>
                                        </div>
                                        <input  type="submit" href="login" class="btn btn-primary btn-user btn-block" value="Send OTP">
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