<!DOCTYPE html>
<html lang="en">

<head>
    @include('components/header')
    @include('components.modals.SuccessModal')
    <title>LMS Change password</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/new-password.css')}}">
</head>

<body>
<center>
                                    
                                    <form class="user" method="POST" action="reset_password">
                                    <div class="text-center">
                                    <img class="logo-icon" src="{{ URL('img/logo.png')}}" alt="logo"><br>
                                        <h1 class="h4 text-gray-900 mb-2">Enter new password</h1>
                                    </div>

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

{{--                                        <div class="form-group">--}}
{{--                                            <input type="email" class="form-control form-control-user"--}}
{{--                                                   id="exampleInputEmail" aria-describedby="emailHelp"--}}
{{--                                                   placeholder="Retype password" name="email" value="{{ $email }}" readonly>--}}
{{--                                        </div>--}}
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                       id="inputOTP" aria-describedby="otpcode"
                                                       placeholder="OTP Code" name="otp" @error('otp')style="border: 3px solid #F19E9EFF;" @enderror>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                       id="exampleInputEmail" aria-describedby="emailHelp"
                                                       placeholder="Password" name="password" @error('password')style="border: 3px solid #F19E9EFF;" @enderror>
                                            </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                   id="exampleInputEmail" aria-describedby="emailHelp"
                                                   placeholder="Retype password" name="password_confirmation" @error('password_confirmation')style="border: 3px solid #F19E9EFF;" @enderror>
                                        </div>
                                        <input type= "submit" class="btn btn-primary btn-user btn-block" value="Reset password">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

   @include('components/footer')
</center>
</body>

</html>
