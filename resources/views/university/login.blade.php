@extends('master_admin')
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                <form class="login100-form validate-form" action="{{route('university.signin')}}" method="POST">
                    {{csrf_field()}}
					<span class="login100-form-title p-b-33">
						University Login
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="University Email" value="{{old('email')}}">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>

                    <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>


                    <div class="container-login100-form-btn m-t-20">
                        <button type="submit" class="login100-form-btn">
                            Sign in
                        </button>
                    </div>
                    @if(!empty($errors))
                        <div class="error-log" style="margin-top:5px;">
                            @foreach($errors->all() as $error)
                                <small class="text-danger">* {{$error}}</small><br>
                            @endforeach
                        </div>
                    @endif
                    <div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

                        <a href="#" class="txt2 hov1">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

                        <a href="{{URL::to(route('university.signup.show'))}}" class="txt2 hov1">
                            Sign up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

